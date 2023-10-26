<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_no',
        'order_id',
        'tax',
        'shipping',
        'discount',
        'total_amount'
    ];


    public function order(){
        return $this->belongsTo(Order::class, 'order_id')->with('order_details', 'customer');
    }

}
