<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CallCenterController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return inertia()->render('Dashboard/callCenter/index', [
            'products' => $products
        ]);
    }
}
