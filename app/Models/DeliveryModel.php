<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryModel extends Model
{
    use HasFactory;
    public $table = 'destinatarios';
    public function sale_info()
    {
        return $this->belongsTo(SalesModel::class, 'idventa');
    }
}
