<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $profile = DB::table('users') -> join('profiles' , 'users.id' , '=' , 'profiles.user_id')
                ->select('users.*' , 'profiles.*')
                ->where(['profiles.user_id' => $user_id])
                ->first();
                /*->get();
              return $profile
                exit();*/
                //query for connect with db and display

        return view('home' , ['profile' => $profile]);

    }
}
