<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $table='ventas';

    protected $primaryKey = 'idventa';

    protected $fillable =  array('fecha', 'tipo de pago', 'monto','zapatos');
}
