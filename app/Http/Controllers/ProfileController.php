<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 04/02/2016
 * Time: 12:10
 */

namespace App\Http\Controllers;


use App\Repositories\ProfileRepository;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $profile;

    public function __construct(ProfileRepository $profile)
    {
        $this->profile = $profile;
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        $friends = $user->friends;
        return view('profile', compact('user', 'friends'));
    }

    public function show($user){
        $user = User::findOrFail($user);
        $friends = $user->friends;
        return view('profile-show', compact('user', 'friends'));
    }
}