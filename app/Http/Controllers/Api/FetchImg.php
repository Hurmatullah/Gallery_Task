<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class FetchImg extends Controller
{
    public function index()
    {
        $data = Item::get()->take(5);
        return response()->json($data);
    }
}
