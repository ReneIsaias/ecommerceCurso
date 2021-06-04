<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const Borrador = 1;
    const Publicado = 2;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'subcategory_id',
        'brand_id',
        'quantity',
        'status',
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
        /* Para que nos traiga el valor de quantity */
        return $this->belongsToMany(Color::class)->withPivot('quantity');
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
        return $this->morphMany(Image::class, 'imageable');
    }

    //Para hacer las url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
