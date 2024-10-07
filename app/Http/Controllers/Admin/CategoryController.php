<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Http\Request;
use App\Models\Category; // Assuming you have a Category model
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function __construct(private Category $category)
    {
    }

    public function index()
    {
        $categories = $this->category->withCount('products')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name']);

        $this->category->create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit(string $category)
    {
        $category = $this->category->findOrFail($category);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(string $category, Request $request)
    {
        $category = $this->category->findOrFail($category);
        $category->update($request->all());
        return redirect()->back();
    }

    public function destroy(string $category)
    {
        $category = $this->category->findOrFail($category);
        $category->delete();
        return redirect()->back();
    }
}
