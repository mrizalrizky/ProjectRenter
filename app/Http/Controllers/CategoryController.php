<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pages.admin.category', compact('categories'));
    }

    public function add()
    {
        return view('pages.admin.category-add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);
        $category = Category::create($request->all());
        return redirect()->route('admin.category')->with('status', 'Category Added Successfully');
    }

    public function edit($name)
    {
        $category = Category::where('name', $name)->first();

        return view('pages.admin.category-edit', compact('category'));
    }

    public function update(Request $request, $name)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::where('name', $name)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect()->route('admin.category')->with('status', 'Category updated Successfully');
    }

    public function delete($name)
    {
        $category = Category::where('name', $name) -> first();

        return view('pages.admin.category-delete', compact('category'));
    }

    public function destroy($name)
    {
        $category = Category::where('name', $name) -> first();
        $category->delete();
        return redirect()->route('admin.category')->with('status','Category Deleted Successfully');
    }

    public function deletedCategory()
    {
        $deletedCategories = Category::onlyTrashed()->get();

        return view('pages.admin.category-deleted-list', compact('deletedCategories'));
    }

    public function restore($name)
    {
        $category = Category::withTrashed()->where('name', $name)->first();
        $category->restore();
        return redirect()->route('admin.category')->with('status','Category Restored Successfully');
    }
}
