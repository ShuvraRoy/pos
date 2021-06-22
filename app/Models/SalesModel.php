<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesModel extends Model
{
    use HasFactory;
    public $table = 'ventas';
    const UPDATED_AT = null;
    const CREATED_AT = 'fecha';
    protected $primaryKey = 'idventas';
}
