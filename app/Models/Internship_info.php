<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Internship_info extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    use HasFactory;

    protected $primaryKey = 'student_id';
    public $incrementing = false;
    protected $softCascade = ['event','evaluation_answer'];
    protected $fillable = [
        'student_id',
        'professor_id',
        'mentor_email',
        'internship_detail_id',
        'grade',
        'report_file_path',
    ];
    
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','student_id');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class,'professor_id','professor_id');
    }    

    public function mentor()
    {
        return $this->belongsTo(Mentor::class,'mentor_email','email');
    }

    public function evaluation_answers(){
        return $this->hasMany(Evaluation_answer::class,'internship_id','internship_id');
    }

    public function internship_detail(){
        return $this->hasOne(Internship_detail::class,'internship_detail_id','internship_detail_id');
    }

    public function event(){
        return $this->hasOne(Event::class,'student_id','student_id');
    }

}
