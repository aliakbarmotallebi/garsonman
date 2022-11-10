<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Meal;
use App\Traits\ProductImagesUpload;

class ProductController extends Controller
{
    use ProductImagesUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('dashboard.products.create', compact(
            'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:products|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'img' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        $request->merge([
            'image' => $this->uploadImage(
                request()->file('img') )
        ]);

        $product = auth()->user()->products()->create($request->all());


        if($product instanceof Product)
            alert()->success('با موفقیت ایجاد شد!');

        return redirect()->route('dashboard.products.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::latest()->get();
        return view('dashboard.products.edit', compact(
            'categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
            'img' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        if($request->has('img')){

            $request->merge([
                'image' => $this->uploadImage(
                request()->file('img') )
            ]);
        }

        $updated = $product->update($request->all());

        if($updated)
            alert()->success('با موفقیت بروزرسانی شد!');

        return redirect()->route('dashboard.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            alert()->info('با موفقیت حذف شد!');
        }catch (\Exception $e){}

        return redirect()->route('dashboard.products.index');
    }
}
