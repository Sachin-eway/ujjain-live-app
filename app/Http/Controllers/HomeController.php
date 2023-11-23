<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return redirect('dashboard');
    }
    public function profile()
    {   $user = User::where('email',Session()->get('email'))->first();
        return view('profile',['user'=>$user]);
    }
    public function changePass(Request $request)
    {
        $request->validate([
            'old' => 'required',
            'new' => 'required',
            'confirm' => 'required_with:new|same:new'
        ]);
       
        $user = User::where('id',$request->id)->first();
        $pass = Auth::user();
    
        if(!Hash::check($request->input('old'), $pass->password)){
            return response(false);
        }else{
             $user->update([
                'password'=> Hash::make($request->new)
            ]);
            return response(true);
       }
        
    }
}
