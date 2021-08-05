<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historys extends Model
{
    use HasFactory;
    Protected $guarded = ['history'];

    public function hubungis()
    {
        return $this->belongsTo('App\Models\hubungis');
    }
}
