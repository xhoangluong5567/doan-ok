<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $table = 'order_items';


    public function order_item(): BelongsTo {
        return $this->belongsTo(Order::class);
    }
}