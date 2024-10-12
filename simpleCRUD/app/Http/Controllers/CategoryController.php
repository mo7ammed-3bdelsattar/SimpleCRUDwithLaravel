<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('site.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('site.categories.create');
    }
    public function store(CategoryRequest $request)
    {
        // dd();
        $category = Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'category stored successfully');
    }
    public function show(Category $category)
    {

        return view('site.categories.show', compact('category'));
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'category deleted successfully');
    }
    public function edit(Category $category)
    {
        return view('site.categories.edit', compact('category'));
    }
    public function update(CategoryRequest $request,$id)
    {
        Category::where('id', $id)
            ->update([
                'title'=>$request->title,
            ]);
        return redirect()->route('categories.index')->with('success', 'category updated successfully');
    }
}
