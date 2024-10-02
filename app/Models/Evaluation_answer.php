<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation_answer extends Model
{
    use HasFactory;

    protected $primaryKey = 'answer_id';

    protected $fillable = [
        'form_id',
        'part_id',
        'question_id',
        'answer',
        'remark',
        'internship_id',
    ];

    public function question_list(){
        return $this->belongsTo(Question_list::class,['form_id', 'part_id', 'question_id'], ['form_id', 'part_id', 'question_id']);
    }

    public function inernship_info(){
        return $this->belongsTo(Internship_info::class,'internship_id','internship_id');
    }
}
