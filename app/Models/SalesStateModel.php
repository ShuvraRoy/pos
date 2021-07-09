<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesStateModel extends Model
{
    use HasFactory;
    public $table = 'ventas_estados';
    protected $primaryKey = 'idestados';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public function sale_info()
    {
        return $this->belongsTo(SalesModel::class, 'idventa');
    }
}
