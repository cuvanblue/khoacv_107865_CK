<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Illuminate\Events\queueable;

class LoginController extends Controller
{
    //
    public function index(){
        return view('admin.login');
    }
    public function postlogin(Request $request){
        //xử lý login
        //dd($request->input());
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt([
            'email'=> $request->input('email'),
            'password'=>$request->input('password')
        ])){
            return view('admin.home',[
                'title'=>'Trang chủ'
            ]);
        }
        Session()->flash('error','Email hoặc Password không chính xác');
        return redirect()->back();

    }

}
