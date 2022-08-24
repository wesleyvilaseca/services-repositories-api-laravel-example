<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'brand_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class, 'product_options', 'product_id', 'option_id');
    }
}
