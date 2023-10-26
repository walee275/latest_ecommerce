<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'ip_address',
        'primary_phone',
        'secondary_phone',
        'country',
        'postal_code',
        'address'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
