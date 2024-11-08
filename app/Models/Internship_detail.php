<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Internship_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey = 'internship_detail_id';

    protected $fillable = [
        'student_id',
        'company_id',
        'register_semester',
        'year',
        'start_date',
        'end_date',
        'attend_to'
    ];

    public function student(){
        return $this->belongsTo(Student::class,'student_id','student_id');
    }

    public function internship_info(){
        return $this->belongsTo(Internship_info::class,'internship_detail_id','internship_detail_id');
    }
    
    public function company(){
        return $this->belongsTo(Company::class,'company_id','company_id');
    }

    public function application(){
        return $this->belongsTo(Application::class,'internship_detail_id','internship_detail_id');
    }

}
