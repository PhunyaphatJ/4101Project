<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response_letter extends Model
{
    use HasFactory;
    protected $primaryKey = 'response_letter_id';

    protected $fillable = [
        'response_letter_path',
        'admin_email',
    ];

    public function admin(){
        return $this->belongsTo(Person::class,'admin_email','email');
    }
}
