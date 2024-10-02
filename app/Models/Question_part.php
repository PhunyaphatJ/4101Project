<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_part extends Model
{
    use HasFactory;
    
    protected $primaryKey = ['form_id', 'part_id'];
    public $incrementing = false;

    protected $fillable = [
        'form_id',
        'part_id',
        'part_text',
    ];

    public function question_form()
    {
        return $this->belongsTo(Question_form::class, 'form_id', 'form_id');
    }

    public function question_lists(){
        return $this->hasMany(Question_list::class,['form_id', 'part_id'], ['form_id', 'part_id']);
    }
}
