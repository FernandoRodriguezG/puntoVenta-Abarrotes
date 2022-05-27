@extends('layouts.app')
@section('title', 'Nuevo usuario')
@section('content')


<div class="container">
    <div class="row">
        
        <div class="col-8"><h3>Añadir usuario</h3></div>
        <div class="col-2"></div>
        <br><br>
    </div>
    <form action="/guardausuario" method="POST">
        @csrf
        <div class="form-group row">
             <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
        </div>

        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

        <button type="submit" class="btn btn-primary btn-block">Añadir usuario</button>

    </form>
</div>

@endsection