<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Appreciation_app extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'application_id',
        'professor_email',
        'company_id',
    ];
    public function application(){
        return $this->belongsTo(Application::class,'application_id','application_id');
    }

    public function professor(){
        return $this->belongsTo(Professor::class,'professor_email','email');
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id','company_id');
    }
}
