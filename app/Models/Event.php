<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $primaryKey = 'event_id';

    protected $fillable = [
        'date',
        'student_email',
        'professor_email',
    ];


    //คิดว่าควร relation with internship_id 
    public function student(){
        return ;
    }
    
}
