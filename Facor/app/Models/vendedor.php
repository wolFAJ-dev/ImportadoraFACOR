<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'Vendedor';
    
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
    ];

    public function ventas()
    {
        return $this->hasMany(ventas::class, 'vendedor_id', 'id');
    }
}
