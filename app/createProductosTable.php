<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class createProductosTable extends Model
{
    //
    protected $table="productos";
    use SoftDeletes;
    protected $dates = ['deleted_at'];  
}
