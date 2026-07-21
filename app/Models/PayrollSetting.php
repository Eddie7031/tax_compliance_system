<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayrollSetting extends Model
{
    protected $fillable = [
        'nssf_rate',
        'nssf_ceiling',
        'shif_rate',
        'shif_minimum',
        'housing_levy_rate',
        'personal_relief',
    ];
}
