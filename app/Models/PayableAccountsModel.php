<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayableAccountsModel extends Model
{
    use HasFactory;
    public $table = 'cuentas';
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $primaryKey = 'idcuentas';
    public function provider_info()
    {
        return $this->belongsTo(ProviderModel::class, 'idproveedor');
    }
}
