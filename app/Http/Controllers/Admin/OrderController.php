<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of direct orders and product inquiries.
     */
    public function index(Request $request)
    {
        $query = Order::with(['items.product'])->latest();

        // Search Filter
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%")
                  ->orWhere('customer_email', 'like', "%{$search}%")
                  ->orWhere('customer_phone', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('state', 'like', "%{$search}%")
                  ->orWhereHas('items', function ($itemQuery) use ($search) {
                      $itemQuery->where('product_name', 'like', "%{$search}%")
                                ->orWhere('product_sku', 'like', "%{$search}%");
                  });
            });
        }

        // Order Status Filter
        if ($request->filled('status')) {
            $query->where('order_status', $request->status);
        }

        // Payment Status Filter
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        // Date Filter
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // KPI Summaries
        $totalOrdersCount = Order::count();
        $newOrdersCount = Order::where('order_status', 'new')->count();
        $processingOrdersCount = Order::whereIn('order_status', ['processing', 'confirmed'])->count();
        $deliveredOrdersCount = Order::where('order_status', 'delivered')->count();
        $totalRevenue = Order::where('payment_status', 'paid')->sum('total_amount');
        $totalPipelineValue = Order::sum('total_amount');

        $orders = $query->paginate(12)->withQueryString();

        $statuses = ['new', 'processing', 'confirmed', 'shipped', 'delivered', 'cancelled'];
        $paymentStatuses = ['pending', 'paid', 'failed', 'refunded'];

        return view('admin.orders.index', compact(
            'orders',
            'totalOrdersCount',
            'newOrdersCount',
            'processingOrdersCount',
            'deliveredOrdersCount',
            'totalRevenue',
            'totalPipelineValue',
            'statuses',
            'paymentStatuses'
        ));
    }

    /**
     * Display the specified direct order.
     */
    public function show($id)
    {
        $order = Order::with(['items.product', 'user'])->findOrFail($id);

        $statuses = [
            'new'        => 'New / Received',
            'processing' => 'In Processing',
            'confirmed'  => 'Confirmed by Concierge',
            'shipped'    => 'Shipped with Insured Courier',
            'delivered'  => 'Delivered to Client',
            'cancelled'  => 'Cancelled'
        ];

        $paymentStatuses = [
            'pending'  => 'Pending Verification',
            'paid'     => 'Paid / Confirmed',
            'failed'   => 'Payment Failed',
            'refunded' => 'Refunded'
        ];

        return view('admin.orders.show', compact('order', 'statuses', 'paymentStatuses'));
    }

    /**
     * Update order and payment status.
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'order_status'   => 'required|string|in:new,processing,confirmed,shipped,delivered,cancelled',
            'payment_status' => 'required|string|in:pending,paid,failed,refunded',
            'customer_notes' => 'nullable|string|max:1000',
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders.show', $order->id)
            ->with('success', 'Order #' . $order->order_number . ' status updated successfully!');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $orderNumber = $order->order_number;
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order #' . $orderNumber . ' was deleted successfully.');
    }
}
