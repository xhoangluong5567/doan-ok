<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $guarded = [''];

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
        return array_get($this->status,$this->active, '[N\A]'); 
    }




    public $timestamps = false;
    protected $dateFormat = 'U';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

    protected $fillable =[
        'name', 'active'
    ];

    public function products() {
        return $this->hasMany(Product::class,'categories_id');
    }
}
