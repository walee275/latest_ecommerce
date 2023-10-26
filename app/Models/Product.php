<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'categorie_id',
        'sub_category_id',
        'price',
        'cost_price',
        'vendor_id',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function pictures()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function sizes(){
        return $this->hasMany(ProductSize::class);
    }
    public function vendor(){
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function sales(){
        return $this->hasMany(OrderDetail::class, 'product_id')->with('order');
    }
}
