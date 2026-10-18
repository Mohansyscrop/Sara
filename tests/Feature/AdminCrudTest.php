<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

class AdminCrudTest extends TestCase
{
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::where('email', 'developer@syscorp.in')->first() ?? User::where('email', 'admin@gmail.com')->first();
        if ($this->admin) {
            $this->actingAs($this->admin);
        }
    }

    public function test_admin_products_crud()
    {
        Storage::fake('public');
        $category = Category::first();

        // 1. Index
        $response = $this->get('/admin/products');
        $response->assertStatus(200);

        // 2. Create Page
        $response = $this->get('/admin/products/create');
        $response->assertStatus(200);

        // 3. Store
        $response = $this->post('/admin/products', [
            'name' => 'Automated Test Silk Suit',
            'slug' => 'automated-test-silk-suit',
            'category_id' => $category->id,
            'sku' => 'TEST-SKU-9999',
            'price' => 4999,
            'mrp' => 6999,
            'discount' => 28,
            'stock_quantity' => 15,
            'availability' => 'in_stock',
            'fabric' => 'Banarasi Katan Silk',
            'color' => 'Crimson Red',
            'status' => '1',
            'sizes' => ['S', 'M', 'L'],
            'main_image' => UploadedFile::fake()->create('suit.jpg', 100, 'image/jpeg'),
        ]);
        $response->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', ['sku' => 'TEST-SKU-9999']);

        $product = Product::where('sku', 'TEST-SKU-9999')->first();

        // 4. Show
        $response = $this->get('/admin/products/' . $product->id);
        $response->assertStatus(200);

        // 5. Edit
        $response = $this->get('/admin/products/' . $product->id . '/edit');
        $response->assertStatus(200);

        // 6. Update
        $response = $this->put('/admin/products/' . $product->id, [
            'name' => 'Automated Test Silk Suit (Updated)',
            'category_id' => $category->id,
            'sku' => 'TEST-SKU-9999',
            'price' => 5499,
            'stock_quantity' => 20,
            'availability' => 'in_stock',
            'status' => '1',
        ]);
        $response->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', ['name' => 'Automated Test Silk Suit (Updated)']);

        // 7. Delete
        $response = $this->delete('/admin/products/' . $product->id);
        $response->assertRedirect('/admin/products');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_admin_categories_crud()
    {
        // 1. Index
        $response = $this->get('/admin/categories');
        $response->assertStatus(200);

        // 2. Store
        $response = $this->post('/admin/categories', [
            'name' => 'Test Silk Couture',
            'slug' => 'test-silk-couture',
            'description' => 'Fine silk collection test',
            'status' => 1,
            'sort_order' => 10,
        ]);
        $response->assertRedirect('/admin/categories');
        $this->assertDatabaseHas('categories', ['slug' => 'test-silk-couture']);

        $category = Category::where('slug', 'test-silk-couture')->first();

        // 3. Edit & Update
        $response = $this->get('/admin/categories/' . $category->id . '/edit');
        $response->assertStatus(200);

        $response = $this->put('/admin/categories/' . $category->id, [
            'name' => 'Test Silk Couture Updated',
            'status' => 1,
        ]);
        $response->assertRedirect('/admin/categories');

        // 4. Delete
        $response = $this->delete('/admin/categories/' . $category->id);
        $response->assertRedirect('/admin/categories');
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_admin_contacts_management()
    {
        $contact = Contact::create([
            'name' => 'Test Client',
            'email' => 'client@test.com',
            'phone' => '+91 99999 88888',
            'subject' => 'Fitting appointment',
            'message' => 'Test message for concierge workflow',
            'status' => 'New',
        ]);

        $response = $this->get('/admin/contacts/' . $contact->id);
        $response->assertStatus(200);
        $response->assertSee('Test Client');

        $response = $this->put('/admin/contacts/' . $contact->id, [
            'status' => 'In Progress',
            'admin_notes' => 'Concierge reached out on WhatsApp.',
        ]);
        $response->assertRedirect('/admin/contacts/' . $contact->id);
        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'status' => 'In Progress',
            'admin_notes' => 'Concierge reached out on WhatsApp.',
        ]);

        $response = $this->delete('/admin/contacts/' . $contact->id);
        $response->assertRedirect('/admin/contacts');
        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }

    public function test_admin_settings()
    {
        $response = $this->get('/admin/settings');
        $response->assertStatus(200);
        $response->assertSee("Saras Boutique");

        $response = $this->post('/admin/settings', [
            'store_name' => "Saras Boutique",
        ]);
        $response->assertRedirect('/admin/settings');
    }
}
