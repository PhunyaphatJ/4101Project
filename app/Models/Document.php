<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $primaryKey = 'document_id';

    protected $fillable = [
        'document_path',
        'document_type',
        'admin_email',
    ];

    public function admin(){
        return $this->belongsTo(Admin::class,'admin_email','email');
    }

}
