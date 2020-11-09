<?php
namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function find($productId)
    {
        return Product::find($productId);
    }

    public function all()
    {
        return Product::all();
    }
    
    public function create(array $data)
    {
        $product = Product::create($data);
        return $product;
    }
    
    public function update($productId, array $data)
    {
        $product = Product::find($productId);
        $product->update($data);
        return $product;
    }

    public function delete($productId)
    {
        Product::destroy($productId);
    }
    
    public function withCategory()
    {
        return Product::with('category');
    }
    
    public function duplicateProducts()
    {
        return Product::selectRaw('name, COUNT(*) as duplicate_count')->groupBy('name')->having("duplicate_count", ">", "1");
    }
}
