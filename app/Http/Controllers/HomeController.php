<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 02/02/2016
 * Time: 16:23
 */

namespace App\Http\Controllers;


use App\Repositories\StatusRepository;
use App\Status;

class HomeController extends Controller
{
    protected $status;

    public function __construct(StatusRepository $status)
    {
        $this->status = $status;
        $this->middleware('auth');
    }

    public function index(){
        $statuses = $this->status->getStatuses();
        return view('home', compact('statuses'));
    }
}