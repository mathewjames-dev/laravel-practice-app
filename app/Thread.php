<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Thread extends Model
{
    protected $table = 'threads';

    protected $fillable = ['subject'];

    public function participants(){
        return $this->hasMany('App\Participant', 'thread_id', 'id');
    }

    public function messages(){
        return $this->hasMany('App\Message', 'thread_id', 'id');
    }

    public function scopeForUser($query, $userId)
    {
        return $query->join('participants', 'threads.id', '=', 'participants.thread_id')
            ->where('participants.user_id', $userId)
            ->select($this->getTable() . '.*');
    }


    public function markAsRead($userId)
    {
        try {
            $participant = $this->getParticipantFromUser($userId);
            $participant->last_read = new Carbon;
            $participant->save();
        } catch (ModelNotFoundException $e) {
            // do nothing
        }
    }

    /**
     * Finds the participant record from a user id.
     *
     * @param $userId
     * @return mixed
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getParticipantFromUser($userId)
    {
        return $this->participants()->where('user_id', $userId)->firstOrFail();
    }
}
