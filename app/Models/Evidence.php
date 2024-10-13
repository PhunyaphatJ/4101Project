<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Evidence extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'evidences';
    protected $primaryKey = 'student_id';
    public $incrementing = false;

    protected $fillable = [
        'student_id',
        'credit',
        'idcard_path',
        'transcript_path',
        'recentreceipt_path',
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id','student_id');
    }

}
