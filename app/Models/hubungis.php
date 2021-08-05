<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hubungis extends Model
{
    use HasFactory;
    Protected $guarded = ['hubungi'];

    public function profils()
    {
        return $this->belongsTo('App\Models\profils');
    }
}
