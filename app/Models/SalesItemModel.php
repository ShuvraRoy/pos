<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItemModel extends Model
{
    use HasFactory;
    public $table = 'ventas_articulos';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $primaryKey = 'idva';
    public function sales_info()
    {
        return $this->belongsTo(SalesModel::class, 'idventa ');
    }
    public function articulo_info()
    {
        return $this->belongsTo(InventoryModel::class, 'idarticulo');
    }
}
