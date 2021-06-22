<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryModel extends Model
{
    use HasFactory;
    public $table = 'articulos';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $primaryKey = 'idarticulos';
}
