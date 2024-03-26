<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class FilterImg extends Controller
{
    public function filterImg($id)
    {
        $data = Item::where('id', $id)->get();
        return response()->json($data);
    }
}
