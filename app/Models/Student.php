<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    use HasFactory;

    protected $softCascade = ['address','internship_info','application','evidence','internship_detail'];
    protected $fillable = [
        'email', 
        'student_id', 
        'student_type', 
        'department', 
        'address_id',
    ];
    public function person()
    {
        return $this->belongsTo(Person::class,'email','email');
    }

    public function address()
    {
        return $this->hasOne(Address::class,'address_id','address_id');
    }
    public function internship_info()
    {
        return $this->hasOne(Internship_info::class,'student_id','student_id');
    }

    public function applications(){
        return $this->hasMany(Application::class,'student_id','student_id');
    }
    

    public function internship_details(){
        return $this->hasMany(Internship_detail::class,'student_id','student_id');
    }

    public function evidence(){
        return $this->hasOne(Evidence::class,'student_id','student_id');
    }

}
