<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','supplier_id','product_name','product_code','product_image','quantity','status'];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
