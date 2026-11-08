<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mekanik extends Model
{
    protected $table = 'mekanik';
    protected $primaryKey = 'Id_mecanic';
    public $incrementing = false;
    protected $keyType = 'string';

    const CREATED_AT = 'Created_at';
    const UPDATED_AT = 'Updated_at';

    protected $fillable = [
        'Id_mecanic',
        'Nama_mecanic',
        'Alamat_mecanic',
        'Tgllahir_mecanic',
        'Tempattgllahir_mecanic',
        'No_tlpn',
        'Email_mecanic',
        'Status_job',
        'Status_mecanic',
        'Created_by',
        'Updated_by',
    ];
}