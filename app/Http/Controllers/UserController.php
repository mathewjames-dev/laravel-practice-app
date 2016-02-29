<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 08/02/2016
 * Time: 10:20
 */

namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        return view('users', compact('users'));
    }

    public function addConnection($id)
    {
        $this->user->addConnection($id);
        session()->flash('flash_message', 'Successfully Requested Add!');
        return redirect('/users');
    }

    public function removeConnection($id)
    {
        $this->user->removeConnection($id);
        session()->flash('flash_message', 'Successfully Removed Connection!');
        return redirect('/users');
    }

    public function toggleChat()
    {
        $input = Input::get('off');
        $this->user->setChatStatus($input);
        return 'Success';
    }
}