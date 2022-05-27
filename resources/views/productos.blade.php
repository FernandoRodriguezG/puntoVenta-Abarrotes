@extends('layouts.app')
@section('title', 'Productos')
@section('content')

        <div class="container">PRODUCTOS</div><br>
        <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Código</th>
                    <th scope="col">Stock disponible</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($productos as $p)
                <tr>
                    <th scope="row">{{$p->id}}</th>
                    <td>{{$p->nombre}}</td>
                    <td>{{$p->marca}}</td>
                    <td>{{$p->precio}}</td>
                    <td>{{$p->codigo}}</td>
                    <td>{{$p->stock}}</td>
                    <td>
                    <a href="/editar/{{$p->id}}"><i class="fas fa-edit" style="color:#86B88C"></i></a>
                    <a href="/EliminaProducto/{{$p->id}}"><i class="fas fa-trash-alt" style="color:#86B88C"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

@endsection
