<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class SortData extends Controller
{
    public function sortName()
    {
        $data = Item::orderBy("name")->get();
        return view("/index", compact("data"));
    }

    public function sortDate()
    {
        $data = Item::orderBy("date_created")->get();
        return view("/index", compact("data"));
    }

    public function sortTime()
    {
        $data = Item::orderBy("time_created")->get();
        return view("/index", compact("data"));
    }
}
