<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\createProductosTable;
use Illuminate\Support\Facades\DB;
use App\Carrito;

class ProductosController extends Controller
{
    public function index()
    {
        $productos=createProductosTable::all();
        return view('productos')->with('productos',$productos);
    }

    public function guardaProductos(Request $request)
    {
        //Funcion pa guardar los productos en bases de datos
        if(isset($request->identificador)){
            $prod = createProductosTable::find($request->identificador);
            $prod->stock = $request->stock + $prod->stock;
        }
        else{
            $prod=new createProductosTable();
            $prod->stock = $request->stock;
        }
        
        $prod->nombre = $request->nombreProducto;
        $prod->marca = $request->marcaProducto;
        $prod->precio = $request->precio;
        $prod->codigo = $request->codigo;
        
        $prod->save();

        if(isset($request->identificador)){
            return redirect('/productos');
        }

        return redirect()->back();
    }

    public function new()
    {
       return view('nuevoProducto');
    }

    public function edita($id = null)
    {
        if(!is_null($id)){
            $producto=createProductosTable::find($id);
            return view("editaProducto")->with('producto',$producto);

        }
        else{
            return redirect('/productos');
        }
    }

    public function busqueda(Request $request)
    {
        $carrito=Carrito::all();
        if($request->tipo == 'nombre'){
            $productos = DB::table('productos')->where('nombre','LIKE','%'.$request->producto.'%')->get();
            return view('/nuevaVenta')->with('productos',$productos)->with('carrito',$carrito);
        }
        else{
            $productos = DB::table('productos')->where('codigo','LIKE','%'.$request->producto.'%')->get();
            return view('/nuevaVenta')->with('productos',$productos)->with('carrito',$carrito);
        
        }
        
    }
    public function eliminaProducto($id = null)
    {
        $producto=createProductosTable::find($id);
        $producto->delete($id);
        return redirect('/productos');
    }
}
