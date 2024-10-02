<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship_report extends Model
{
    use HasFactory;
    public function internship_info()
    {
        return $this->belongsTo(Internship_info::class,'internship_id','internship_id');
    }
}