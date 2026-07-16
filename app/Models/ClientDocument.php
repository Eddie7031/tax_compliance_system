<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientDocument extends Model
{
    protected $fillable = [
        'client_id',
        'document_name',
        'document_type',
        'file_path',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}