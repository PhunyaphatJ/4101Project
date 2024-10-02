<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Internship_info extends Model
{
    use HasFactory,softDeletes;

    protected $primaryKey = 'internship_id';

    protected $fillable = [
        'student_email',
        'professor_email',
        'mentor_email',
        'company_id',
        'register_semester',
        'year',
    ];
    
    public function student()
    {
        return $this->belongsTo(Student::class,'student_email','email');
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class,'professor_email','email');
    }    

    public function mentor()
    {
        return $this->belongsTo(Mentor::class,'mentor_email','email');
    }

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','company_id');
    }

    public function internship_report()
    {
        return $this->hasOne(Internship_report::class,'internship_id','internship_id');
    }

    public function evaluation_answers(){
        return $this->hasMany(Evaluation_answer::class,'internship_id','internship_id');
    }

}
