<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_list extends Model
{
    use HasFactory;

    protected $primaryKey = ['form_id', 'part_id', 'question_id'];
    public $incrementing = false;

    protected $fillable = [
        'form_id',
        'part_id',
        'question_id',
        'question_text',
    ];

    public function question_part()
    {
        return $this->belongsTo(Question_part::class, ['form_id', 'part_id'], ['form_id', 'part_id']);
    }

    public function evaluation_answers(){
        return $this->hasMany(Evaluation_answer::class, ['form_id', 'part_id', 'question_id'], ['form_id', 'part_id', 'question_id']);
    }

}
