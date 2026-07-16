<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'company_name',
        'pin',
        'email',
        'phone',
        'contact_person',
        'industry',
        'address',
        'is_active',
    ];

    public function documents()
    {
        return $this->hasMany(ClientDocument::class);
    }

    public function taxObligations()
    {
        return $this->hasMany(TaxObligation::class);
    }
    public function vatAnalyses()
{
    return $this->hasMany(VatAnalysis::class);
}
}