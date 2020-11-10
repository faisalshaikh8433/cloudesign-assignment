<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductPermissionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_the_admin_can_view_a_product()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $product = Product::factory()->create();

        $this->get("/products/{$product->id}")
        ->assertRedirect('products');
    }
}
