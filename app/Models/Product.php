<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT_ON = 1;
    const HOT_OFF = 0;

    protected $status = [
        1 => [
            'name' => 'Kích hoạt',
            'class' => 'btn btn-block btn-info btn-sm'
        ],
        0 => [
            'name' => 'Vô hiệu hóa',
            'class' => 'btn btn-block btn-danger btn-sm'
        ]
    ];

    protected $hot = [
        1 => [
            'name' => 'Nổi bật',
            'class' => 'btn btn-block btn-success btn-sm'
        ],
        0 => [
            'name' => 'Không',
            'class' => 'btn btn-block btn-secondary btn-sm'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status,$this->pro_active,'[N\A]');
    }
    public function getHot()
    {
        return array_get($this->hot,$this->pro_hot,'[N\A]');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'pro_category_id');
    }
}
