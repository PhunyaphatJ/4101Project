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

    public function admin()
    {
        return $this->hasOne(Admin::class,'email','email');
    }


    public function user()
    {
        return $this->belongsTo(User::class,'email','email');
    }

    public function applications(){
        return $this->hasMany(Application::class,'applicant_email','email');
    }

  
}
