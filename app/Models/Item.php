<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * relation
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_keeps()
    {
        return $this->belongsToMany(User::class);
    }

    // 自分が表示中の商品にいいねをしているか
    public static function checkKeepItem($itemId)
    {
        $item = Item::find($itemId);
        $res = $item->user_keeps()->get();

        return $res->isNotEmpty();
    }
}
