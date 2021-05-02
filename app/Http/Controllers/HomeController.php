<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


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

        $user = User::find(auth()->user()->id);
        $user->login_status = 1;
        $user->save();

        if (auth()->user() && auth()->user()->role_id == 1) {
            return redirect('admin');
        }
    }


    public function adminView(){
        return view('admin.adminView');
    }
}
