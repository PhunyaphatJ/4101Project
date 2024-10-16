<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'email','status',
    ];


    public function person(){
        return $this->belongsTo(Person::class,'email','email');
    }

    public function documents(){
        return $this->hasMany(Document::class,'admin_email','email');
    }

}
