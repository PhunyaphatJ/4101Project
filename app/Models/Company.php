<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    
    use HasFactory;
    protected $table = 'companies';
    protected $primaryKey = 'company_id';
    protected $softCascade = ['address','mentor'];

    protected $fillable = [
        'company_name',
        'phone',
        'address_id',
        'fax',
    ];

    public function address()
    {
        return $this->hasOne(Address::class,'address_id','address_id');
    }

    public function mentors()
    {
        return $this->hasMany(Mentor::class,'company_id','company_id');
    }

    public function internship_details()
    {
        return $this->hasMany(Internship_detail::class,'company_id','company_id');
    }
}
