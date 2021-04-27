<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    const STATUS_PUBLIC=1;
    const STATUS_PRIVATE=0;

    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'label-danger'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'label-default'
        ]
    ];
    public function getStatus() 
    {
        return array_get($this->status,$this->active,'[N\A]');
    }

    



    protected $table = 'products';
    protected $guarded = [''];

    protected $fillable = [
        'id',
        'name',
        'images_feature',
        'price',
        'warranty',
        'accessories',
        'discount',
        'status',
        'images',
        'desc',
        'categories_id',
    ];

    public $timestamps = true;

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    const HOT=1;
    const NO_HOT=0;

    protected $vip = [
        1 => [
            'name' => 'Nổi bật',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Không',
            'class' => 'label-primary'
        ]
    ];
    public function getHot() 
    {
        return array_get($this->vip,$this->hot,'[N\A]');
    }
    


}
