<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return inertia()->render('Dashboard/categories/index', ['categories' => $categories]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/categories/create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
        ]);

        Category::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم الاضافة بنجاح'
        ]);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return inertia()->render('Dashboard/categories/edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'sometimes',
            'name_ar' => 'sometimes',
        ]);

        $category->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);

        return redirect()->route('categories.index');

    }
}
