<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Person extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    use HasFactory;

    protected $table = 'persons';
    protected $primaryKey = 'email';
    public $incrementing = false;
    protected $softCascade = ['student','professor'];


    protected $fillable = [
        'email', 
        'prefix', 
        'name', 
        'surname', 
        'phone',
    ];

    public function student()
    {
        return $this->hasOne(Student::class,'email','email');
    }

    public function professor()
    {
        return $this->hasOne(Professor::class,'email','email');
    }


    public function user()
    {
        return $this->belongsTo(User::class,'email','email');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class,'sender_email','email');
    }

    public function internship_manual(){
        return $this->hasMany(Internship_manual::class,'admin_email','email');
    }
    
    public function response_letter(){
        return $this->hasOne(Response_letter::class,'admin_email','email');
    }

}
