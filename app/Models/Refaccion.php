<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refaccion extends Model
{
    use HasFactory;

    protected $table = 'refacciones';

    protected $fillable = [
        'nombre',
        'codigo',
        'marca',
        'categoria',
        'descripcion',
        'precio',
        'precio_compra',
        'stock',
        'stock_minimo',
        'imagen',
        'proveedor',
        'activo'
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'precio_compra' => 'decimal:2',
        'stock' => 'integer',
        'stock_minimo' => 'integer',
        'activo' => 'boolean'
    ];

    // Scope para refacciones activas
    public function scopeActivas($query)
    {
        return $query->where('activo', true);
    }

    // Scope para refacciones con stock bajo
    public function scopeStockBajo($query)
    {
        return $query->whereColumn('stock', '<=', 'stock_minimo');
    }

    // Accessor para verificar si hay stock disponible
    public function getTieneStockAttribute()
    {
        return $this->stock > 0;
    }

    // Accessor para verificar si el stock está bajo
    public function getStockBajoAttribute()
    {
        return $this->stock <= $this->stock_minimo;
    }

    // Relación con ventas (si aplica)
    public function ventas()
    {
        return $this->belongsToMany(Venta::class)
                    ->withPivot('cantidad', 'precio_unitario')
                    ->withTimestamps();
    }
}