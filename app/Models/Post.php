<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'image', 'category_id', 'available_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function cartItems(){
        return $this->hasMany(Cart::class);
    }
}
