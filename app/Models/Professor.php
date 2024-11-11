<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Professor extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'email', 
        'professor_id', 
        'remark', 
        'status', 
        'last_assigned_at',
        'assigned',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class,'email','email');
    }

    public function internship_infos()
    {
        return $this->hasMany(Internship_info::class,'professor_id','professor_id');
    }
}
