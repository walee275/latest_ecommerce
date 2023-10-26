<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'order_no',
        'total_amount',
        'payment_method',
        'status'
    ];


    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id')->with('user');
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class, 'order_id')->with('product');
    }
}
