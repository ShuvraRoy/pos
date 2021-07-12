<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItemModel extends Model
{
    use HasFactory;
    public $table = 'articulos_componentes';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $primaryKey = 'idcomponentes ';
}
