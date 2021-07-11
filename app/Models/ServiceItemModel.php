<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceItemModel extends Model
{
    use HasFactory;
    public $table = 'servicios_articulos';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $primaryKey = 'idsa';
    public function service_info()
    {
        return $this->belongsTo(SalesModel::class, 'idservicio');
    }
    public function inventory_info()
    {
        return $this->belongsTo(InventoryModel::class, 'idarticulo');
    }
}
