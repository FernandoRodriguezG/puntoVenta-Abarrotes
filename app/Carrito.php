<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    //
    protected $table="carrito";
    protected $primaryKey = 'idProducto';
}
