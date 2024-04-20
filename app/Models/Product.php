<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'prix', 'category_name', 'tags', 'image_path'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categorie');
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class, '');

    }

}
