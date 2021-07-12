<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPaymentModel extends Model
{
    use HasFactory;
    public $table = 'ventas_pagos';
    protected $primaryKey = 'idpagos';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public function sales_info()
    {
        return $this->belongsTo(SalesModel::class, 'idventa');
    }
}
