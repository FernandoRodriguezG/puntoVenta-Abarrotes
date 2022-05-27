@extends('layouts.app')
@section('title', 'Nueva venta')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8"><h3>Nueva Venta</h3></div>
        <div class="col-2"></div>
        <div class="col-2">

        </div>
        <br><br>
    </div>
    <form action="/buscaProducto" method="GET">
        <input type="text" name="producto" id="producto" class="form-control" placeholder="Buscar producto" required>
        <br>
        <div class="row">
            <div class="col-2">
                <input type="radio" name="tipo" id="tipo" value="nombre" checked> Por Nombre <br>
                <input type="radio" name="tipo" id="tipo" value="codigo"> Por código
            </div>
            <div class="col-9"></div>
            <div class="col-1">
            <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>
    <br>
    @if(isset($productos) && count($productos)>0)
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Código</th>
                    <th scope="col">Precio por unidad</th>
                    <th scope="col">Cantidad:</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
        @foreach($productos as $p)
            <tr> 
                <td>{{$p->nombre}}</td>
                <td>{{$p->codigo}}</td>
                <td>${{$p->precio}}.00</td>
                @if($p->stock>0) 
                <form action="/addprod" method="POST">
                    @csrf
                    <input type="hidden" name="idProducto" value="{{$p->id}}">
                    <input type="hidden" name="precioInd" value="{{$p->precio}}">
                    <input type="hidden" name="nombreProd" value="{{$p->nombre}}">
                    <td>
                        <input type="number" class="form-control" name="cant" id="cant" max="{{$p->stock}}" placeholder="Disp: {{$p->stock}}" required>
                    </td>
                    <td>
                        <input type="submit" value="Añadir" class="btn btn-primary">
                    </td>
                </form>
                @else
                    <td>
                        <input type="number" class="form-control" name="cant" id="cant" max="{{$p->stock}}" placeholder="Disp: {{$p->stock}}" disabled>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger" disabled>No disponible</a>
                    </td>
                @endif
            </tr>
        @endforeach
            </tbody>
        </table>
    @else
    <h3>Ingresa una busqueda valida</h3><br>
    @endif
    @if(count($carrito)>0)
    <div class="row">
        <div class="col-8"><h3>Carrito</h3></div>
        <div class="col-2"></div>
        <div class="col-2">
        </div>
        <br><br>
    </div>
    <table class="table table-success table-striped">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">P / U</th>
        <th scope="col">Total producto</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($carrito as $c)
            <tr>
                <td scope="col">
                    {{$c->nombreProducto}}
                </td>
                <td scope="col">
                    <a href="/quitauno/{{$c->idProducto}}">
                        <i class="fas fa-minus" style="color:green"></i>
                    </a>
                    {{$c->cantidad}}
                    <a href="/agregauno/{{$c->idProducto}}">
                        <i class="fas fa-plus" style="color:green"></i>
                    </a>
                </td>
                <td scope="col">${{$c->precioUnitario}}.00</td>
                <td scope="col" class="TProducto">{{$c->cantidad*$c->precioUnitario}}.00</td>
                <td scope="col">
                    <a href="/eliminaCarro/{{$c->idProducto}}">
                        <i class="fas fa-trash" style="color:blACK"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        <tfoot>
            <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">TOTAL:</th>
            <th scope="col" class="totalFinal"></th>
            <th scope="col"></th>
            </tr>
        </tfoot>
    </tbody>
</table>
    <a href="/ventaExitosa" class="btn btn-primary">Finalizar venta</a>
    <a href="/borrarCarrito" class="btn btn-danger">Eliminar carrito</a>
    @endif
</div>
<script>
    $(document).ready(function(){
        var total = 0.0;
        $(".TProducto").each(function(){
          total = parseInt($(this).text())+total;
        });
        $(".totalFinal").prepend("$"+total+".00");
    }
      );
</script>
@endsection