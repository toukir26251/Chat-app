<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatHistory extends Model
{
    protected $fillable=['sender_id','text','receiver_id'];
}
