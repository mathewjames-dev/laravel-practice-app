<?php
/**
 * Created by PhpStorm.
 * User: mjames
 * Date: 02/02/2016
 * Time: 16:23
 */

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('home');
    }
}