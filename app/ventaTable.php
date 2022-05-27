<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\detalleVenta;

class ventaTable extends Model
{
    //

    protected $table="venta";


    public function detalleVenta()
    {
        return $this->hasMany('App\detalleVenta','idVenta');
    }
}
