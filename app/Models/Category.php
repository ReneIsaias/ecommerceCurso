<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'icon',
    ];

    /* Relacion 1 : N */
    /* Un categoría tiene uno o muchas subcategorías */
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    /* Relacion N : M */
    /* Una categoría tiene pertenece a muchos brands */
    public function brands()
    {
        return $this->belongsToMany(Brand::class); 
    }

    /* Relacion 1 : N atra vez de */
    /* Una categoría tiene muchos productos a travez de las subcategorias */
    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}
