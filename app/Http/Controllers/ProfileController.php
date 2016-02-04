<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 04/02/2016
 * Time: 12:10
 */

namespace App\Http\Controllers;


use App\Repositories\ProfileRepository;

class ProfileController extends Controller
{
    protected $profile;

    public function __construct(ProfileRepository $profile)
    {
        $this->profile = $profile;
        $this->middleware('auth');
    }

    public function index(){
        return view('profile');
    }
}