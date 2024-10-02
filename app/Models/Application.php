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
        'internship_registers',
        'recommendation_apps',
        'appreciation_apps',
    ];

    protected $fillable = [
        'application_name',
        'document_status',
        'student_email',
    ];

    public function internship_register(){
        return $this->hasOne(Internship_register::class,'application_id','application_id');
    }

    public function internship_request(){
        return $this->hasOne(Internship_request_app::class,'application_id','application_id');
    }

    public function recommendations(){
        return $this->hasOne(Recommendation_app::class,'application_id','application_id');
    }
    
    public function Appreciation(){
        return $this->hasOne(Appreciation_app::class,'application_id','application_id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'email','student_email');
    }
}
