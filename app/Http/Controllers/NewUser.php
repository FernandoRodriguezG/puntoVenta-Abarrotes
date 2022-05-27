<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\DB;

class NewUser extends Controller
{
    //
    protected function create(Request $data)
    {
        User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->back();
    }

    public function pantalla()
    {
       return view('nuevoUsuario');
    }
    public function mostrar()
    {
        $users=User::all();
        return view('usuarios')->with('users',$users);
    }
    public function edit(Request $request)
    {
        if(isset($request->identificador)){
            $user = User::find($request->identificador);
        }
        
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->save();

        
        return redirect('/usuarios');
        
    }
    public function editarUsuario($id = null)
    {
        if(!is_null($id)){
            $user=User::find($id);
            return view("editausuario")->with('producto',$user);

        }
        else{
            return redirect('/usuarios');
        }
    
    }
    public function borrar($id = null)
    {
        $user=User::find($id);
        $user->destroy($id);
        return redirect('/usuarios');
    }
}
