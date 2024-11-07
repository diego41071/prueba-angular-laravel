<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        // Obtener todas las categorías y devolverlas como respuesta JSON
        return response()->json(Categoria::all());
    }
    // Mostrar el formulario para crear una categoría
    public function create()
    {
        return view('categorias.create');
    }

    // Almacenar una nueva categoría
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Crear la nueva categoría
        Categoria::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada con éxito.');
    }

}
