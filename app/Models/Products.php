<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name',
        'price',
        'stock',
        'photo',
        'description',
        'category_id',
        'stand'
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
