<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'unit'])->get();

        return inertia()->render('Dashboard/products/index', ['products' => $products]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/products/create', [
            'categories' => Category::all(),
            'units' => Unit::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'name_ar' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        Product::create($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم الاضافة بنجاح'
        ]);

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $product->load(['category', 'unit']);
        return inertia()->render('Dashboard/products/edit', [
            'product' => $product,
            'categories' => Category::all(),
            'units' => Unit::all()
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'sometimes',
            'name_ar' => 'sometimes',
            'unit_id' => 'sometimes',
            'category_id' => 'sometimes',
            'price' => 'sometimes',
            'stock' => 'sometimes',
        ]);

        $product->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);

        return redirect()->route('products.index');

    }
}
