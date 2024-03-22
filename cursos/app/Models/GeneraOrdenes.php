<?php

namespace App\Models;
use HasFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneraOrdenes extends Model
{
    protected $table = 'ordenes_generadas';
    protected $primaryKey = 'ord_id';

    protected $fillable= [
        'mat_id',
        'codigo',
        'fecha_resgistro',
        'valor_pagar',
        'fecha_pago',
        'valor_pagado',
        'mat_estado',
        'mes',
        'responsable',
        'secuencial', 
        'documento',
    ];
    }
}
