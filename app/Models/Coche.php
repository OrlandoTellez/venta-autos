<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coche extends Model
{
    use HasFactory;

      public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    /** 
     * Nombre de la tabla (opcional; Laravel lo deduce como ‘clientes’).
     * Descomenta si tu tabla se llama distinto.
     */
    protected $table = 'coches';

    /**
     * Atributos que se pueden asignar en masa.
     */
    protected $fillable = [
        'matricula',
        'marca',
        'modelo',
        'color',
        'precio',
    ];

    /**
     * Casts para columnas; así `created_at` y `updated_at`
     * se devuelven ya como Carbon (fechas).
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /* ──────────────────────────────
     |  ACCESSORS / MUTATORS OPCIONALES
     ──────────────────────────────*/

    /**
     * Devuelve la fecha de registro en YYYY‑MM‑DD.
     * Úsalo en Blade así:  {{ $cliente->fecha_registro }}
     */
    public function getFechaRegistroAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }
}
