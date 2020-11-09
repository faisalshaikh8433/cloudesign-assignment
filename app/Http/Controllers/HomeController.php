<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $duplicateCount = Product::selectRaw('name, COUNT(*) as duplicate_count')->groupBy('name')->having("duplicate_count", ">", "1")->get()->count();
        return view('home', compact('productCount', 'categoryCount', 'duplicateCount'));
    }
}
