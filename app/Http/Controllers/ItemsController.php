<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreComment;
use App\Models\Item;
use App\Models\ItemUser;

class ItemsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->only('addComment');
    }

    public function show(Item $item)
    {
        $recommended_items = Item::where('brand_id', $item->brand->id)->inRandomOrder()->limit(15)->get();
        $keep_count = ItemUser::where('item_id', $item->id)->get()->count();
        $comments = $item->comments()->orderBy('created_at', 'desc')->get();

        return view('items.show', compact('item', 'recommended_items', 'keep_count', 'comments'));
    }

    public function keepItem(Item $item)
    {
        $user_id = Auth::id();
        $item->user_keeps()->sync($user_id);

        return redirect()->back();
    }

    public function removeKeep(Item $item)
    {
        $user_id = Auth::id();
        $item->user_keeps()->detach($user_id);

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search_word = $request->search;

        $items = Item::where('name', 'LIKE', '%'.$search_word.'%')->orWhere('description', 'LIKE', '%'.$search_word.'%')->get();

        return view('items.search', compact('search_word', 'items'));
    }

    public function addComment(StoreComment $request, Item $item)
    {
        $user_id = Auth::id();

        $item->comments()->create([
            'body' => $request->body,
            'user_id' => $user_id
        ]);

        return redirect()->back();
    }
}
