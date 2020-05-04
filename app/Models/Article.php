<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [
        1 => [
            'name' => 'Kích hoạt',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Vô hiệu hóa',
            'class' => 'label-danger'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status,$this->a_active,'[N\A]');
    }
}
