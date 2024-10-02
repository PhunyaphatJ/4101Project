<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation_app extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'application_id',
        'internship_app_info_id',
        'mentor_email',
        'mentor_position',
        'mentor_fax',
        'mentor_phone',
        'response_letter_path',
    ];

    public function application(){
        return $this->belongsTo(Application::class,'application_id','application_id');
    }

    public function internship_app_info(){
        return $this->hasOne(Internship_app_info::class,'internship_app_info_id','internship_app_info_id');
    }
}
