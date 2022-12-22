<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|min:4']);
        Category::create(['name' => $request->name]);

        return redirect('/category')->with('message', 'category successfully added');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|min:4']);
        Category::findOrFail($id)->update(['name' => $request->name]);

        return redirect('/category')->with('message', 'category successfully edited');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect('/category')->with('message', 'category successfully deleted');
    }
}
