<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zapatos extends Model
{
    use HasFactory;
    
    protected $table='zapatos';
    protected $primaryKey='idzapato';

    protected $fillable =  array('calzado', 'tipo', 'color', 'talla', 'marca', 'genero',  'edades');
}
