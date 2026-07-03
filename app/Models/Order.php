<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'payment_method',
        'payment_status',
        'order_status',
        'sub_total',
        'tax',
        'shipping',
        'total_amount',
    ];
}
