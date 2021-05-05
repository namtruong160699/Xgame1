<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = ['*'];

    const STATUS_DONE = 2;
    const STATUS_DEFAULT = 1;

    protected $status = [
        2 => [
            'name' => 'Đã xử lý',
            'class' => 'btn btn-block btn-success btn-sm'
        ],
        1 => [
            'name' => 'Chờ xử lý',
            'class' => 'btn btn-block btn-info btn-sm'
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status,$this->tr_status,'[N\A]');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'tr_user_id');
    }
}
