<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengalamans extends Model
{
    use HasFactory;
    Protected $guarded = ['pengalaman'];

    public function hubungis()
    {
        return $this->belongsTo('App\Models\hubungis');
    }
}
