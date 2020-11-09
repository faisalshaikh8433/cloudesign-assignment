<?php
namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    // get product by id
    public function find($productId);

    // get all products
    public function all();

    // create a product
    public function create(array $data);
    
    // delete a product
    public function delete($productId);

    // update a product
    public function update($productId, array $data);
    
    // products eagerloaded with categories
    public function withCategory();
    
    // duplicate products
    public function duplicateProducts();
}
