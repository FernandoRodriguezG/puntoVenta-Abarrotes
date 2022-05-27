@extends('layouts.app')
@section('title', 'Nuevo producto')
@section('content')

<div class="container">
    <div class="row">
        
        <div class="col-8"><h3>Registrar un nuevo producto</h3></div>
        <div class="col-2"></div>
        <br><br>
    </div>
    <form action="/guardaproducto" method="POST">
        @csrf
        <div class="form-group row">
        <label for="nombreProducto" class="col-md-2 col-form-label ">Nombre del producto</label>
            <div class="col-md-10">
                <input id="nombreProducto" type="text" class="form-control" name="nombreProducto" required>     
            </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="marcaProducto" class="col-md-2 col-form-label ">Marca del producto</label>
            <div class="col-md-10">
                <input id="marcaProducto" type="text" class="form-control" name="marcaProducto" required>     
            </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="precio" class="col-md-2 col-form-label ">Precio:</label>
            <div class="col-md-10">
                <input id="precio" type="number" class="form-control" name="precio" required>     
            </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="codigo" class="col-md-2 col-form-label ">Número de Código:</label>
            <div class="col-md-10">
                <input id="codigo" type="number" class="form-control" name="codigo" required>     
            </div>
        </div>
        <br>
        <div class="form-group row">
        <label for="stock" class="col-md-2 col-form-label ">Stock disponible:</label>
            <div class="col-md-10">
                <input id="stock" type="number" class="form-control" name="stock" required>     
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary btn-block">Guardar producto</button>

    </form>
</div>


@endsection