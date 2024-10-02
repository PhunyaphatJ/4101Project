<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_form extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'form_id';
    public $incrementing = false;

    protected $fillable = [
        'form_name',
        'form_description',
    ];

    public function question_parts(){
        return $this->hasMany(Question_part::class,'form_id','form_id');
    }
}
