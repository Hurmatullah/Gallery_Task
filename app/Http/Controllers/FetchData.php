<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class FetchData extends Controller
{
    public function index()
    {
        $data = Item::get()->take(5);
        return view("index", compact("data"));
    }
}
