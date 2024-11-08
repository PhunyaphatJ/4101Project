<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;


class Internship_info extends Model
{
    use HasFactory;

    protected $primaryKey = 'student_id';
    public $incrementing = false;
    
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

    public function getCompanyName (){
        return $this->internship_detail->company->company_name;
    }

    public function getSemester(){
        return $this->internship_detail->register_semester;
    }

    public function getYear(){
        return $this->internship_detail->year;
    }

    public function getStartDate(){
        return $this->internship_detail->start_date;
    }

    public function getEndDate(){
        return $this->internship_detail->end_date;
    }

    public function getAttendTo(){
        return $this->internship_detail->attend_to;
    }
}
