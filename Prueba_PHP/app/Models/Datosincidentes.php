<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datosincidentes extends Model
{
    use HasFactory;
    protected $table = 'incidentes';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['cedula', 'id_cliente', 'id_usuario', 'descripcion', 'reporte'];
}
