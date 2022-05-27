@extends('layouts.app')
@section('title', 'Historial de ventas')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-8"><h3>Historial de Ventas</h3></div>
        <div class="col-2"></div>
        <div class="col-2"></div>
        <br><br>
    </div>
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha y hora</th>
                    <th scope="col">Total pagado</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($ventas as $v)
                <tr>
                    <th scope="row">{{$v->id}}</th>
                    <td>{{$v->created_at}}</td>
                    <td>${{$v->total}}.00</td>
                    <td>
                        <a href="/detalleVenta/{{$v->id}}" style="color:Green">
                            <i class="fas fa-info-circle"style="color:green"></i> Más detalles
                        </a>
                    </td>
                    <th scope="col">
                        <a href="/notaVenta/{{$v->id}}" class="btn btn-primary">Nota de venta</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
</div>
        

@endsection
