<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorSize extends Model
{
    use HasFactory;

    /* Definimos a que tabla hace referencia */
    protected $table = "color_size";

    /* Relacion uno a muchos inversa */
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    /* Relacion uno a muchos inversa */
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
}
