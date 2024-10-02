<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Internship_register extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'application_id',
        'student_id',
        'credit',
        'department',
        'transcript_path',
        'idcard_path',
        'recentreceipt_path',
    ];


    public function application(){
        return $this->belongsTo(Application::class,'application_id','application_id');
    }
}
