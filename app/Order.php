<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $table = 'orders';

    public function orders(): BelongsTo {
        return $this->belongsTo(OrderItem::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

}
