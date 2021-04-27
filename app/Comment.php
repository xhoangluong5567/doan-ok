<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $table = 'comment';
    protected $guarded = [];



    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

}
