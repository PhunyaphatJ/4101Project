<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship_manual extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'manual_id';

    protected $fillable = [
        'manual_path',
        'admin_email',
    ];

    public function admin(){
        return $this->belongsTo(Person::class,'admin_email','email');
    }
}
