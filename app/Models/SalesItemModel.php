<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItemModel extends Model
{
    use HasFactory;
    public $table = 'ventas_articulos';
    const UPDATED_AT = null;
    protected $primaryKey = 'idventas';
}
