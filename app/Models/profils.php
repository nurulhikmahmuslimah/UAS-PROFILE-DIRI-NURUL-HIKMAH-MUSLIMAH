<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profils extends Model
{
    use HasFactory;
    Protected $guarded = ['nama', 'ttl', 'alamat'];

    public function hubungis()
    {
        return $this->belongsTo('App\Models\hubungis');
    }
}
