<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    use HasFactory;

    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $softCascade = ['address','internship_info','application'];
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
        return $this->hasOne(Internship_info::class,'student_email','email');
    }

    public function applications(){
        return $this->hasMany(Application::class,'email','student_email');
    }

}
