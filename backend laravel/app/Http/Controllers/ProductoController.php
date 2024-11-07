<?php

namespace App\Http\Controllers;

use App\Models\Producto;  // Asegúrate de tener el modelo Producto
use App\Models\Categoria;  // Agregar la importación del modelo Categoria
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        // Obtener todos los productos con sus categorías
        $productos = Producto::with('categorias')->get();

        // Devolver los productos en formato JSON
        return response()->json($productos);
    }

    // Mostrar el formulario para crear un producto
    public function create()
    {
        $categorias = Categoria::all();  // Obtener todas las categorías
        return view('productos.create', compact('categorias'));  // Pasar las categorías a la vista
    }

    

    // Guardar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            // Ajusta `categorias` para que no sea requerido
            'categorias' => 'nullable|array',
        ]);

        // Crear el producto
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
        ]);

        // Asignar las categorías seleccionadas al producto
        $producto->categorias()->sync($request->categorias);  // Usar sync para asignar las categorías

        return redirect()->route('productos.index')->with('success', 'Producto agregado con éxito');
    }

    // Mostrar formulario para editar un producto
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();  // Obtener todas las categorías
        return view('productos.edit', compact('producto', 'categorias'));  // Pasar el producto y categorías a la vista
    }

    // Actualizar un producto existente
    public function update(Request $request, $id)
    {
        // Validar la entrada del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'categorias' => 'required|array', // Asegúrate de que el campo 'categorias' sea un arreglo
            'categorias.*' => 'exists:categorias,id', // Asegúrate de que las categorías existan
        ]);
    
        // Buscar el producto por su ID
        $producto = Producto::findOrFail($id);
    
        // Actualizar los campos del producto
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        
        // Guardar los cambios
        $producto->save();
    
        // Sincronizar las categorías
        $producto->categorias()->sync($request->categorias);
    
        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito');
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito');
    }
}
