<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesModel extends Model
{
    use HasFactory;
    public $table = 'ventas';
    protected $primaryKey = 'idventas';
    public function client_info()
    {
        return $this->belongsTo(ClientModel::class, 'idcliente');
    }
    public function venta(){
        return $this->hasMany('SalesItemModel', 'post_id', 'id');
    }

}
