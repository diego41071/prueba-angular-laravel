<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Definir los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'precio',
    ];

    // Relación muchos a muchos: Un producto puede pertenecer a muchas categorías
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_producto', 'producto_id', 'categoria_id');
    }
}
