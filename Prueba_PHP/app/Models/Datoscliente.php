<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datoscliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $primaryKey = 'cedula';
    public $incrementing = false;
    protected $fillable = ['cedula', 'nombres_cliente', 'apellidos_cliente'];
}
