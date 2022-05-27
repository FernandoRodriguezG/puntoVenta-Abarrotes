@extends('layouts.app')
@section('title', 'Detalle de venta')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-8"><h3>Detalle de venta</h3></div>
        <div class="col-2"></div>
        <div class="col-2"></div>
        <br><br>
    </div>
    <div class="row">
        <div class="col-4">Fecha y hora: {{$detalles[0]->created_at}}</div>
        <div class="col-4">Total de la venta: ${{$detalles[0]->total}}.00 </div>
        <div class="col-4">
            <a href="/notaVenta/{{$detalles[0]->idVenta}}" class="btn btn-primary">Nota de venta</a>
        </div>
        <br><br>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio unitario</th>
                    <th scope="col">Total Producto</th>
                </tr>
            </thead>
            <tbody>
            @foreach($detalles as $d)
                <tr>
                    <th scope="col">{{$d->nombre}}</th>
                    <th scope="col">{{$d->cantidad}} unidad(es)</th>
                    <th scope="col">${{$d->precioUnitario}}.00</th>
                    <th scope="col">${{$d->precioTotal}}.00</th>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">TOTAL:</th>
                    <th scope="col">${{$detalles[0]->total}}.00</th>
                </tr>
            </tfoot>
        </table>
        </div>
</div>
        

@endsection
