<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntoGps extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_dispositivo',
        'imei',
        'tiempo_dispositivo',
        'placa_vehiculo',
        'version_fimware',
        'longitud',
        'latitud'
    ];
}
