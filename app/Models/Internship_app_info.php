<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship_app_info extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    use HasFactory;
    
    protected $primaryKey = 'internship_app_info_id';
    protected $softCascade = ['address'];
    
    protected $fillable = [
        'company_name',
        'company_address',
        'company_phone',
        'company_fax',
        'register_semester',
        'year',
        'start_date',
        'end_date',
        'attend_to',
    ];

    public function address(){
        return $this->hasOne(Address::class,'address_id','internship_app_info_id');
    }

    public function internship_request(){
        return $this->belongsTo(Internship_request_app::class,'internship_app_info_id','internship_app_info_id');
    }

    public function recommendation(){
        return $this->belongsTo(Recommendation_app::class,'internship_app_info_id','internship_app_info_id');
    }
}
