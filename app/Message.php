<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = ['thread_id', 'user_id', 'body'];

    public function thread(){
        return $this->belongsTo('App\Thread', 'thread_id', 'id');
    }

    public function participants(){
        return $this->hasMany('App\Participant', 'thread_id', 'thread_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
