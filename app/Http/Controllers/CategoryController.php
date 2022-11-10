<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $products = Product::whereCategoryId($category->id)->get();
        $categories = Category::all();
        return view('main.index', ['products' => $products ,'categories' => $categories]);
        
    }
}
