<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    protected $fillable = ['vendedor_id', 'fecha'];

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'vendedor_id', 'id');
    }

    public function detalles()
    {
        return $this->hasMany(registroventas::class, 'venta_id');
    }

    public function getTotalAttribute()
    {
        return $this->detalles->sum(function ($detalle) {
            return $detalle->cantidad * $detalle->precio_unitario;
        });
    }
}