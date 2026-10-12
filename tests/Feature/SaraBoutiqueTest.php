<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class SaraBoutiqueTest extends TestCase
{
    public function test_home_page_loads_successfully()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee("Sara's Boutique");
    }

    public function test_about_page_loads_successfully()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee("About Us");
    }

    public function test_collections_page_loads_successfully()
    {
        $response = $this->get('/collections');
        $response->assertStatus(200);
        $response->assertSee("Collections");
    }

    public function test_product_detail_page_loads_successfully()
    {
        $product = Product::published()->first();
        if ($product) {
            $response = $this->get('/product/' . $product->slug);
            $response->assertStatus(200);
            $response->assertSee($product->name);
        }
    }

    public function test_contact_page_loads_successfully()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee("Contact Us");
    }

    public function test_contact_form_submission()
    {
        $response = $this->post('/contact', [
            'name' => 'Aditi Sharma',
            'email' => 'aditi@example.com',
            'phone' => '+91 98765 43210',
            'subject' => 'Custom Fitting & Bridal Concierge',
            'contact_method' => 'WhatsApp',
            'message' => 'I would like to schedule a private bespoke fitting session for bridal couture.',
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('contacts', [
            'email' => 'aditi@example.com',
            'name' => 'Aditi Sharma',
        ]);
    }

    public function test_admin_login_redirects_unauthenticated()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_login_and_dashboard_access()
    {
        $adminUser = User::where('email', 'developer@syscorp.in')->first() ?? User::where('email', 'admin@gmail.com')->first();
        
        if ($adminUser) {
            $response = $this->actingAs($adminUser)->get('/admin/dashboard');
            $response->assertStatus(200);
            $response->assertSee("Dashboard Overview");
        }
    }
}
