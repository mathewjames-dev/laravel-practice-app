<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';

    protected $fillable = ['thread_id', 'user_id', 'last_read'];

    public function thread(){
        return $this->belongsTo('App\Thread', 'thread_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
