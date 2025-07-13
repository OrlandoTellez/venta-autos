<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';

    protected $fillable = [
        'cliente_id',
        'coche_id',
        'fecha',
    ];

    protected $casts = ['fecha' => 'date'];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);   // foreign_key = cliente_id
    }

    public function coche()
    {
        return $this->belongsTo(Coche::class);     // foreign_key = coche_id
    }
}
