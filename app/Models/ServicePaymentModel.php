<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePaymentModel extends Model
{
    use HasFactory;
    public $table = 'servicios_pagos';
    protected $primaryKey = 'idpagos';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public function service_info()
    {
        return $this->belongsTo(ServiceModel::class, 'idservicio');
    }
}
