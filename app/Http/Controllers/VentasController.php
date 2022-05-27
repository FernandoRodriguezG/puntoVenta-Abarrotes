<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Carrito;
use App\detalleVenta;
use App\ventaTable;
use PDF;

class VentasController extends Controller
{
    //
    public function nuevaVen()
    {
        $carrito=Carrito::all();
        return view('nuevaVenta')->with('carrito',$carrito);
    }
    public function finalizaVenta()
    {   //VENTA -> ID, IDVENDEDOR, TOTAL
        //DETALLEVENTA -> IDVENTA, IDPRODUCTO, CANTIDAD, PRECIOUNITARIO, PRECIOTOTAL
        //Sacar info del carrito

        //SACAR TOTAL
        $carritoActual=Carrito::all();
        $total = 0;
        foreach($carritoActual as $producto){
            $precioTotal=$producto->precioUnitario* $producto->cantidad;
            $total = $total + $precioTotal;
        }

        //CREAR VENTA
        $venta = new ventaTable();
        $venta->total = $total;
        $venta->save();
        $idV = $venta->id;

        //DETALLE VENTA
        foreach($carritoActual as $producto){
            $deVenta = new detalleVenta();
            $deVenta->idProducto = $producto->idProducto;
            $deVenta->cantidad = $producto->cantidad;
            $deVenta->precioUnitario = $producto->precioUnitario;
            $deVenta->precioTotal = $deVenta->precioUnitario * $deVenta->cantidad;
            $deVenta->idVenta = $idV;
            $deVenta->save();
        }
        //Actualizaciones de stock

        foreach($carritoActual as $producto){
            DB::table('productos')
              ->where('id', $producto->idProducto)
              ->decrement('stock',$producto->cantidad);
        }

        DB::table('carrito')->delete();
        return redirect('/detalleVenta'.'/'.$idV);
    }
    public function historialVentas()
    {
        $ventas = ventaTable::all();
        return view('ventas')->with('ventas',$ventas);
    }

    public function detallesVenta($idVenta = null)
    {
        $detalles= DB::table('detalleventa')
            ->join('productos','detalleventa.idProducto','=','productos.id')
            ->join('venta','detalleventa.idVenta','=','venta.id')
            ->select('detalleventa.*','productos.nombre','venta.total')
            ->where('idVenta',$idVenta)
            ->get();
        return view('detalleventa')->with('detalles',$detalles);
    }
    public function PruebaPDF($idVenta=null)
    {
        $detalles= DB::table('detalleventa')
            ->join('productos','detalleventa.idProducto','=','productos.id')
            ->join('venta','detalleventa.idVenta','=','venta.id')
            ->select('detalleventa.*','productos.nombre','venta.total')
            ->where('idVenta',$idVenta)
            ->get();
        $data = [$detalles];
        $pdf = PDF::loadView('pdf', compact('data'));
        return $pdf->download('Venta - '.$idVenta.'.pdf');    
    }
}
