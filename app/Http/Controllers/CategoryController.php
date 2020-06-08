<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
           'name' => 'required',
           'name_ar' => 'required',
        ]);

        Category::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Category created successfully'
        ]);
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
            'message' => 'Category updated successfully'
        ]);
    }
}
