<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    use HasFactory;

    protected $primaryKey = 'application_id';
    protected $softCascade = [
        'internship_details',
    ];

    protected $fillable = [
        'student_id',
        'applicant_email',
        'application_type',
        'application_status',
        'notification_id',
        'internship_detail_id',
    ];

    public function internship_detail(){
        return $this->hasOne(Internship_detail::class,'internship_detail_id','internship_detail_id');
    }

    public function applicant(){
        return $this->belongsTo(Person::class,'email','email');
    }

    public function person(){
        return $this->belongsTo(Person::class,'applicant_email','email');
    }

    public function notification(){
        return $this->hasOne(Notification::class,'notification_id','notification_id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id','student_id');
    }
    
}
