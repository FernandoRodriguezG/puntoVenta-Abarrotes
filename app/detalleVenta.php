<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalleVenta extends Model
{
    //

    protected $table="detalleventa";
    protected $primaryKey = 'idVenta';
    public function venta()
    {
        return $this->belongsTo('App\ventaTable');
    }
}
