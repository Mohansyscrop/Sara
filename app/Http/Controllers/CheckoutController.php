<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class CheckoutController extends Controller
{
    /**
     * Create local order and initialize Razorpay Order if enabled, or save direct order.
     */
    public function createRazorpayOrder(Request $request)
    {
        $validated = $request->validate([
            'product_id'        => 'required|exists:products,id',
            'quantity'          => 'required|integer|min:1|max:10',
            'color'             => 'nullable|string|max:100',
            'size'              => 'nullable|string|max:50',
            'customer_name'     => 'required|string|max:150',
            'customer_email'    => 'required|email|max:150',
            'customer_phone'    => 'required|string|min:10|max:15',
            'shipping_address'  => 'required|string|max:500',
            'city'              => 'required|string|max:100',
            'state'             => 'required|string|max:100',
            'pincode'           => 'required|string|min:4|max:10',
            'customer_notes'    => 'nullable|string|max:500',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        // Check availability
        if ($product->stock_quantity > 0 && $product->stock_quantity < $validated['quantity']) {
            return response()->json([
                'success' => false,
                'message' => 'Only ' . $product->stock_quantity . ' item(s) left in stock.'
            ], 422);
        }

        // Server-side calculation to prevent tampering
        $unitPrice = (float) $product->price;
        $subtotal = $unitPrice * $validated['quantity'];
        // Free shipping on ₹4,000 and above
        $shippingAmount = ($subtotal >= 4000) ? 0.00 : 150.00;
        $totalAmount = $subtotal + $shippingAmount;
        $amountInPaise = (int) round($totalAmount * 100);

        $isRazorpayEnabled = config('razorpay.enabled', false);

        DB::beginTransaction();
        try {
            $prefix = $isRazorpayEnabled ? 'SB-' : 'SB-DIR-';
            $orderNumber = $prefix . date('Ymd') . '-' . strtoupper(Str::random(5));

            $order = Order::create([
                'order_number'      => $orderNumber,
                'user_id'           => auth()->check() ? auth()->id() : null,
                'customer_name'     => $validated['customer_name'],
                'customer_email'    => $validated['customer_email'],
                'customer_phone'    => $validated['customer_phone'],
                'shipping_address'  => $validated['shipping_address'],
                'city'              => $validated['city'],
                'state'             => $validated['state'],
                'pincode'           => $validated['pincode'],
                'country'           => 'India',
                'subtotal'          => $subtotal,
                'shipping_amount'   => $shippingAmount,
                'discount_amount'   => 0.00,
                'total_amount'      => $totalAmount,
                'currency'          => 'INR',
                'payment_method'    => $isRazorpayEnabled ? 'razorpay' : 'direct_order',
                'payment_status'    => 'pending',
                'order_status'      => 'new',
                'customer_notes'    => $validated['customer_notes'] ?? null,
            ]);

            OrderItem::create([
                'order_id'      => $order->id,
                'product_id'    => $product->id,
                'product_name'  => $product->name,
                'product_sku'   => $product->sku,
                'product_image' => $product->main_image,
                'color'         => $validated['color'] ?? $product->color,
                'size'          => $validated['size'] ?? 'Free Size',
                'price'         => $unitPrice,
                'quantity'      => $validated['quantity'],
                'total'         => $subtotal,
            ]);

            // If Razorpay gateway is disabled, directly complete order submission
            if (!$isRazorpayEnabled) {
                DB::commit();

                return response()->json([
                    'success'      => true,
                    'direct_order' => true,
                    'order_id'     => $order->id,
                    'order_number' => $order->order_number,
                    'message'      => 'Your direct express order has been placed successfully! Our concierge team will reach out to you shortly.',
                    'redirect_url' => route('checkout.success', ['order_number' => $order->order_number]),
                ]);
            }

            // Razorpay gateway logic when enabled
            $keyId = config('razorpay.key_id');
            $keySecret = config('razorpay.key_secret');

            if (empty($keyId) || empty($keySecret)) {
                DB::rollBack();
                return response()->json([
                    'success' => false,
                    'message' => 'Razorpay API keys (RAZORPAY_KEY_ID & RAZORPAY_KEY_SECRET) are missing in the .env file. Please add your keys from Razorpay Dashboard to proceed with payment.'
                ], 422);
            }

            // Call Razorpay API to generate razorpay_order_id
            $api = new Api($keyId, $keySecret);
            $razorpayOrder = $api->order->create([
                'receipt'         => $order->order_number,
                'amount'          => $amountInPaise,
                'currency'        => 'INR',
                'payment_capture' => 1,
                'notes'           => [
                    'order_id'     => (string) $order->id,
                    'order_number' => $order->order_number,
                    'customer'     => $order->customer_name,
                ],
            ]);

            $order->update([
                'razorpay_order_id' => $razorpayOrder['id']
            ]);

            DB::commit();

            return response()->json([
                'success'           => true,
                'direct_order'      => false,
                'order_id'          => $order->id,
                'order_number'      => $order->order_number,
                'razorpay_order_id' => $razorpayOrder['id'],
                'amount'            => $amountInPaise,
                'currency'          => 'INR',
                'key_id'            => $keyId,
                'customer'          => [
                    'name'    => $order->customer_name,
                    'email'   => $order->customer_email,
                    'contact' => $order->customer_phone,
                ],
                'product'           => [
                    'name'  => $product->name,
                    'color' => $validated['color'] ?? $product->color,
                    'size'  => $validated['size'] ?? 'Free Size',
                    'qty'   => $validated['quantity'],
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order Creation Failed: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Unable to complete order submission: ' . $e->getMessage()
            ], 500);
        }
    }


    /**
     * Verify payment signature from Razorpay.
     */
    public function verifyPayment(Request $request)
    {
        $request->validate([
            'order_id'            => 'required|exists:orders,id',
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id'   => 'required|string',
            'razorpay_signature'  => 'required|string',
        ]);

        $order = Order::with('items')->findOrFail($request->order_id);

        $keyId = config('razorpay.key_id');
        $keySecret = config('razorpay.key_secret');

        try {
            $api = new Api($keyId, $keySecret);

            $attributes = [
                'razorpay_order_id'   => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature'  => $request->razorpay_signature,
            ];

            // Throws SignatureVerificationError if invalid
            $api->utility->verifyPaymentSignature($attributes);

            // Valid signature! Update order status
            $order->update([
                'payment_status'      => 'paid',
                'order_status'        => 'processing',
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature'  => $request->razorpay_signature,
            ]);

            // Decrement product stock
            foreach ($order->items as $item) {
                if ($item->product_id) {
                    Product::where('id', $item->product_id)->decrement('stock_quantity', $item->quantity);
                }
            }

            return response()->json([
                'success'      => true,
                'message'      => 'Payment verified successfully!',
                'redirect_url' => route('checkout.success', ['order_number' => $order->order_number]),
            ]);

        } catch (SignatureVerificationError $e) {
            Log::error('Razorpay Signature Verification Failed: ' . $e->getMessage());

            $order->update([
                'payment_status'      => 'failed',
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature'  => $request->razorpay_signature,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Payment signature verification failed. Please contact support.',
            ], 400);

        } catch (\Exception $e) {
            Log::error('Payment processing error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred during payment processing: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show order success / confirmation page.
     */
    public function orderSuccess($order_number)
    {
        $order = Order::with('items.product')->where('order_number', $order_number)->firstOrFail();

        return view('frontend.order-success', compact('order'));
    }
}
