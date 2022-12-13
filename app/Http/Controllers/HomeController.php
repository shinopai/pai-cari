<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class HomeController extends Controller
{
    public function index()
    {
        $items = Item::latest()->limit(60)->get();

        return view('home.index', compact('items'));
    }
}
