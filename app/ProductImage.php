<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    protected $table = 'product_images';

    protected $fillable = ['name', 'image', 'product_id'];

    public $timestamps = true;

    public function product(): BelongsTo {
        return $this->belongsTo(ProductImage::class);
    }
}

