<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory,softDeletes;

    protected $primaryKey = 'address_id';
    protected $table = 'addresses';

    protected $fillable = [
        'house_no', 
        'village_no', 
        'road', 
        'sub_district', 
        'district',
        'province',
        'postal_code',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'address_id','address_id');
    }

    public function company()
    {
        return $this->belongsTo(Student::class,'address_id','address_id');
    }

    public function internship_app_info(){
        return $this->belongsTo(Internship_app_info::class,'address_id','internship_app_info_id');
    }
}
