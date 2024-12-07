<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'amount',
        'status',
        'payment_type',
        'payment_date',
        'description',
        'snap_token',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
