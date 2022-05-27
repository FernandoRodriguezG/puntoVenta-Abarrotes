@extends('layouts.app')
@section('title', 'Editar producto')
@section('content')

<div class="container">
    <form action="/guardaproducto" method="POST">
        @csrf
        <input type="hidden" name="identificador" value="{{$producto->id}}">
        <div class="form-group row">
        <label for="nombreProducto" class="col-md-2 col-form-label ">Nombre del producto</label>
            <div class="col-md-10">
                <input id="nombreProducto" type="text" class="form-control" name="nombreProducto" value="{{$producto->nombre}} ">     
            </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="marcaProducto" class="col-md-2 col-form-label ">Marca del producto</label>
            <div class="col-md-10">
                <input id="marcaProducto" type="text" class="form-control" name="marcaProducto" value="{{$producto->marca}}" >     
            </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="precio" class="col-md-2 col-form-label ">Precio:</label>
            <div class="col-md-10">
                <input id="precio" type="number" class="form-control" name="precio" value="{{$producto->precio}}">     
            </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="codigo" class="col-md-2 col-form-label ">Número de Código:</label>
            <div class="col-md-10">
                <input id="codigo" type="number" class="form-control" name="codigo" value="{{$producto->codigo}}">     
            </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="stock">Stock actual: {{$producto->stock}}</label>
        <label for="stock" class="col-md-2 col-form-label ">¿Cuántos deseas añadir?</label>
            <div class="col-md-10">
                <input id="stock" type="number" class="form-control" name="stock" value="0">     
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block">Guardar producto</button>

    </form>
</div>


@endsection