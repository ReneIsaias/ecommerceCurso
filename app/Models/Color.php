<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /* Relacion N : M */
    /* Un color pertence a mucbos productos */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /* Relacion N : M */
    /* Un color tiene o pertence a muchas tallas o tamaños */
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }
}
