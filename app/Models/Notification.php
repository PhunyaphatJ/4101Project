<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'notification_id';

    protected $fillable = [
        'sender_email',
        'receiver_email',
        'datetime',
        'subject',
        'details',
    ];

    public function sender_email(){
        return $this->belongsTo(User::class,'receiver_email','email');
    }

}
