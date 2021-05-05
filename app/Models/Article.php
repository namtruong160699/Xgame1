<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT = 1;

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

    protected $hot = [
        1 => [
            'name' => 'Có',
            'class' => 'label-success'
        ],
        0 => [
            'name' => 'Không',
            'class' => 'label-danger'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status,$this->a_active,'[N\A]');
    }
    public function getHot()
    {
        return array_get($this->hot,$this->a_hot,'[N\A]');
    }
}
