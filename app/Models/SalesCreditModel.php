<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesCreditModel extends Model
{
    use HasFactory;
    public $table = 'ventas_creditos';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $primaryKey = 'idcreditos';
    public function sales_info()
    {
        return $this->belongsTo(SalesModel::class, 'idventa ');
    }
}
