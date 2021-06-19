<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    use HasFactory;
    public $table = 'clientes';
    const UPDATED_AT = null;
    const CREATED_AT = 'fecharegistro';
}
