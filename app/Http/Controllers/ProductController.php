<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Gate;
use App\Http\Requests\ValidateProduct;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->withCategory()->latest()->paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('product-crud')) {
            $categories = Category::cursor();
            return view('products.create', compact('categories'));
        }
        return redirect('/products')->with('notice', 'You are not allowed to create an product!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProduct $request)
    {
        $product = $this->productRepository->create($request->all());
        if ($request->hasFile('photo')) {
            $request->file('photo')->store('public/images/products');
            // ensure every image has a different name
            $filename = $request->file('photo')->hashName();
            $this->productRepository->update($product->id, ['photo' => $filename]);
        }
        return redirect('/products')->with('success', 'Added new product!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (Gate::allows('product-crud')) {
            $product = $this->productRepository->find($product->id);
            return view('products.show', compact('product'));
        }
        return redirect('/products')->with('notice', 'You are not allowed to view an product!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (Gate::allows('product-crud')) {
            $categories = Category::cursor();
            return view('products.edit', compact('product', 'categories'));
        }
        return redirect('/products')->with('notice', 'You are not allowed to edit an product!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->productRepository->update($product->id, $request->all());
        if ($request->hasFile('photo')) {
            Storage::delete($product->photo);
            $request->file('photo')->store('public/images/products');
            // ensure every image has a different name
            $filename = $request->file('photo')->hashName();
            $this->productRepository->update($product->id, ['photo' => $filename]);
        }
        return redirect('/products')->with('success', 'Product details updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (Gate::allows('product-crud')) {
            $this->productRepository->delete($product->id);
            return redirect('/products')->with('success', 'Product deleted!');
        }
        return redirect('/products')->with('notice', 'You are not allowed to delete an product!');
    }
    
    public function duplicateProducts()
    {
        $products = $this->productRepository->duplicateProducts()->paginate(5);
        return view('products.duplicate', compact('products'));
    }
}
