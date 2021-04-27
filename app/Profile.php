<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    //
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
