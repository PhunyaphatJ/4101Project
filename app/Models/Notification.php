<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotification;

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

    public function application(){
        return $this->belongsTo(Application::class,'notification_id','notification_id');
    }

    public function sendNotification(){
        return Mail::to($this->sender_email)->send(new MailNotification([
            'title' => $this->subject,
            'body' => $this->details,
        ]));
    }

}
