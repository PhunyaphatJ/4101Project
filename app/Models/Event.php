<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'student_id',
        'date',
        'sent',
    ];

    public function internship_info(){
        return $this->belongsTo(Internship_info::class,'student_id','student_id');
    }
    
}
