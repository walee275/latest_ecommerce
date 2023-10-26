<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    // protected $table = 'vendors';


    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'state',
        'country',
        'address',
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
