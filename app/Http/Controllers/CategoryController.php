<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category',['categories'=> $categories]);
    }

    public function add()
    {
        return view('category-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);
        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Category Added Successfully');
    }

    public function edit($name)
    {
        $category = Category::where('name', $name)->first();

        return view('category-edit',['category' => $category]);
    }

    public function update(Request $request, $name)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::where('name', $name)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category updated Successfully');
    }

    public function delete($name)
    {
        $category = Category::where('name', $name) -> first();
        return view('category-delete', ['category' => $category]);

    }

    public function destroy($name)
    {
        $category = Category::where('name', $name) -> first();
        $category->delete();
        return redirect('categories')->with('status','Category Deleted Successfully');
    }

    public function deletedCategory()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        return view('category-deleted-list', ['deletedCategories' => $deletedCategories]);
    }

    public function restore($name)
    {
        $category = Category::withTrashed()->where('name', $name)->first();
        $category->restore();
        return redirect('categories')->with('status','Category Restored Successfully');
    }
}
