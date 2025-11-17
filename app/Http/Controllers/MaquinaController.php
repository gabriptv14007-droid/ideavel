<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;


class MaquinaController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('maquina', compact('productos'));
    }

    public function comprar(Request $request)
    {
        $codigo = strtoupper($request->codigo);
        $dinero = floatval($request->dinero);

        $producto = Producto::where('codigo', $codigo)->first();

        if(!$producto){
            return back()->with('error', "Producto agotado!");
        }

        if($producto->stock <=0){
            return back()->with('error', "Producto agotado!");
        }

        if($dinero < $producto->precio){
            return back()->with('error', "Cantidad erronea");
        }

        $producto->stock -= 1;
        $producto->save();

        $cambio = number_format($dinero - $producto->precio, 2);
        return back()->with('success', "Compra completada con exito! Aqui esta tu cambio $cambio");


    }

}
