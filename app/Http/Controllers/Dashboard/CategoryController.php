<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(7);
        return view('dashboard.categories.index', compact('categories'));
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
            'name' => 'required|unique:categories|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $imagePath = "/upload/categories/";

        $request->image->move(public_path($imagePath), $imageName);


        $category = Category::create(
            $data = array_merge([
                'image' => "{$imagePath}{$imageName}"
            ], $request->only(['name', 'meal_id'])));

        if($category instanceof Category)
            alert()->success('با موفقیت ایجاد شد!');

        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data  = $request->only(['name']);

        if( request()->has('image') ){
            $imageName = time().'.'.$request->image->extension();
            $imagePath = "/upload/categories/";

            $request->image->move(public_path($imagePath), $imageName);
            $data = array_merge([
                'image' => "{$imagePath}{$imageName}"
            ], $data);

        }

        $category->update($data);
        alert()->success('با موفقیت بروزرسانی شد!');
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        alert()->info('با موفقیت حذف شد!');
        return redirect()->route('dashboard.categories.index');
    }
}
