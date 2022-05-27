@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
        <div class="container"><div class="row">
        <div class="col-8"><h3>Lista de usuarios</h3></div>
        <div class="col-2"></div>
        <br><br>
    </div></div><br>
        <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
                <tr>
                    <th scope="row">{{$u->id}}</th>
                    <td>{{$u->name}}</td>
                    <td>
                    <a href="/editausuario/{{$u->id}}"><i class="fas fa-edit" style="color:#86B88C"></i></a>
                    <a href="/borrausuario/{{$u->id}}"><i class="fas fa-trash-alt" style="color:#86B88C"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

@endsection
