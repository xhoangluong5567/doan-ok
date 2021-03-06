<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $table = 'orders';

    public function orders() {
        return $this->hasMany(OrderItem::class,'bill_id');
    }

    public function bill() {
        return $this->belongsTo(Bill::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
