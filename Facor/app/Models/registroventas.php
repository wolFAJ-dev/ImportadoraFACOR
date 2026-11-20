<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class registroventas extends Model
{
    protected $table = 'registroventas';

    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
    ];

    public function venta()
    {
        return $this->belongsTo(ventas::class, 'venta_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}