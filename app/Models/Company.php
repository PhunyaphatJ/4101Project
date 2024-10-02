<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    
    use HasFactory;
    protected $table = 'companys';
    protected $primaryKey = 'company_id';
    protected $softCascade = ['address','mentor'];

    protected $fillable = [
        'house_no',
        'village_no',
        'road',
        'sub_district',
        'district',
        'province',
        'postal_code',
    ];

    public function address()
    {
        return $this->hasOne(Address::class,'address_id','address_id');
    }

    public function mentors()
    {
        return $this->hasMany(Mentor::class,'company_id','company_id');
    }

    public function internship_infos()
    {
        return $this->hasMany(Internship_info::class,'company_id','company_id');
    }

    public function appreciations(){
        return $this->hasMany(Appreciation_app::class,'company_id','company_id');
    }
}
