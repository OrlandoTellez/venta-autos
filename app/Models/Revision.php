<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Revision extends Model
{
    use HasFactory;
    protected $table = 'revisiones';

    protected $fillable = [
        'coche_id',
        'cambio_filtro',
        'cambio_aceite',
        'cambio_frenos',
        'otros',
        'fecha',     // ← nueva
        'costo',     // ← nueva
    ];

    protected $casts = [
        'fecha' => 'date',
        'cambio_filtro' => 'boolean',
        'cambio_aceite' => 'boolean',
        'cambio_frenos' => 'boolean',
    ];
    public function coche()
    {
        return $this->belongsTo(Coche::class);
    }
}
