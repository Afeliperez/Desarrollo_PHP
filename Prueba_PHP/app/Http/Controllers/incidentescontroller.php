<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class incidentescontroller extends Controller
{
    //
    protected $table = 'incidentes';
    protected $fillable = ['id_cliente', 'id_usuario', 'descripcion', 'reporte'];
}
