<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Carrito;


class CarritoController extends Controller
{
    //
    public function addCarrito(Request $request)
    {
        $prod = new Carrito();
        $prod->idProducto = $request->idProducto;
        $prod->cantidad = $request->cant;
        $prod->precioUnitario = $request->precioInd;   
        $prod->nombreProducto = $request->nombreProd;        
        $prod->save();
        $carritoActual=Carrito::all();
        return redirect('/nuevaVenta');
    }

    public function eliminar($idProducto = null)
    {
        DB::table('carrito')->where('idProducto', '=', $idProducto)->delete();
        return redirect('/nuevaVenta');
    }
    public function agregUno($idProducto=null)
    {
        DB::table('carrito')
              ->where('idProducto', $idProducto)
              ->increment('cantidad',1);
        return redirect('/nuevaVenta');
    }
    public function quitaUno($idProducto = null)
    {
        DB::table('carrito')
              ->where('idProducto', $idProducto)
              ->decrement('cantidad',1);
        return redirect('/nuevaVenta');
    }
    public function borrarCarrito(Type $var = null)
    {
        DB::table('carrito')->delete();
        return redirect('/nuevaVenta');
    }
}
