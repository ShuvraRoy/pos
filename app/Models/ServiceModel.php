<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;
    public $table = 'servicios';
    protected $primaryKey = 'idservicios';
    public $timestamps = null ;
    public function client_info()
    {
        return $this->belongsTo(ClientModel::class, 'idcliente');
    }
}
