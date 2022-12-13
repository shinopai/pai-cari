<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function show(Item $item)
    {
        $recommended_items = Item::where('brand_id', $item->brand->id)->inRandomOrder()->limit(15)->get();

        return view('items.show', compact('item', 'recommended_items'));
    }
}
