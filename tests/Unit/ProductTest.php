<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function it_belongs_to_an_category()
    {
        $product = Product::factory()->create();

        $this->assertInstanceOf('App\Models\Category', $product->category);
    }
}
