<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'color',
        'size',
        'category_id',
    ];

    /* Relacion 1 : N inversa*/
    /* Un subcategoría pertence a una categoría */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /* Relacion 1 : N */
    /* Una subcategoría puede tener muchos productos */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
