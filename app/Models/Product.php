<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'subcategory_id',
        'brand_id',
        'quantity',
    ];

    /* Relacion 1 : N inversa */
    /* Un producto pertence a muchos brands */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /* Relacion 1 : N Inversa */
    /* Un producto pertence a una subcategoría */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    /* Relacion N : M */
    /* Un producto tiene muchos colores */
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    /* Relacion 1 : M */
    /* Un producto tiene muchos tamaños */
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    /* Relacion 1 : M polimofirca */
    /* Un producto tiene una a muchas imagenes  */
    public function image()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }
}