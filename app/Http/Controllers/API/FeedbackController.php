<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = auth()->user()->feedback;

        return response()->json($feedback);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['message' => 'required']);

        $feedback = auth()->user()->feedback()->create($data);

        return response()->json($feedback);
    }
}
