<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mentor extends Model
{
    use HasFactory,softDeletes;

    protected $primaryKey = 'email';
    public $incrementing = false;

    protected $fillable = [
        'email',
        'name',
        'surname',
        'position',
        'phone',
        'fax',
        'company_id',
    ];

    public function company()
    {
        return $this->hasOne(Company::class,'company_id','company_id');
    }

    public function internship_infos()
    {
        return $this->hasMany(Internship_info::class,'mentor_email','email');
    }
}
