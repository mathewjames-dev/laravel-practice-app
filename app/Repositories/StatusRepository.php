<?php namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Status;
use App\Http\Requests;
use DB;
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 03/02/2016
 * Time: 14:20
 */
class StatusRepository
{
    public function postStatus($user){
        $status = new Status();
        $status->body = Input::get('status');
        $status->user_id = $user->id;
        $status->save();
    }

    public function getStatuses(){
        return Status::where('created_at', '<=', Carbon::now())->orderBy('created_at', 'DESC')->get();
    }
}