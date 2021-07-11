<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountspaymentModel extends Model
{
    use HasFactory;
    public $table = 'cuentas_pagos';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $primaryKey = 'idpagos';
    public function account_info()
    {
        return $this->belongsTo(PayableAccountsModel::class, 'idcuenta');
    }
}
