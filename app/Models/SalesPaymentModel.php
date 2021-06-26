<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPaymentModel extends Model
{
    use HasFactory;
    public $table = 'ventas_pagos';
    protected $primaryKey = 'idpagos';
    public function sales_info()
    {
        return $this->belongsTo(SalesModel::class, 'idventa ');
    }
}
