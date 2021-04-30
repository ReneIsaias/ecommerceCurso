<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /* Relacion N : M */
    /* Un brand tiene muchas categorias */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /* Relacion 1 : N */
    /* Un bran tiene muchos productos  */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
