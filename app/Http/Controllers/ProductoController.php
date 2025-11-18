<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id', 'desc')->get();
        return view('productos.index', compact('productos'));
    }

    public function store(Request $request)
    {
       $validator = $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock'  => 'required|integer'
        ]);

        $producto = Producto::create($request->only('codigo', 'nombre', 'precio', 'stock'));

        dd($producto);
        return back()->with('ok', 'Producto creado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return back()->with('ok', 'Producto eliminado correctamente');
    }
}
