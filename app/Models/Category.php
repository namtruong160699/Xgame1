<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOME = 1;

    protected $status = [
        1 => [
            'name' => 'Public',
            'class' => 'btn btn-block btn-info btn-sm'
        ],
        0 => [
            'name' => 'Private',
            'class' => 'btn btn-block btn-danger btn-sm'
        ]
    ];

    protected $home = [
        1 => [
            'name' => 'Hiện',
            'class' => 'btn btn-block btn-success btn-sm'
        ],
        0 => [
            'name' => 'Ẩn',
            'class' => 'btn btn-block btn-secondary btn-sm'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status,$this->active,'[N\A]');
    }

    public function getHome()
    {
        return array_get($this->home,$this->c_home,'[N\A]');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'pro_category_id');
    }
}
