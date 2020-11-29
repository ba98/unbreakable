<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class PagesController extends Controller
{
    public function profile(){

        $user = Auth::user();
        return view('profile',compact('user',$user));
    }

    public function registerUsers(){

        return view('registerUsers');
    }
    public function ptsRespond(){
        return view('PTS.respond');
    }

    public function pts(){
        return view('PTS.index');
    }

    public function abu(){
        return view('abu');
    }

    public function dash(){
        return view('admin.index');
    }

    public function manageUsers(){
        return view('admin.users');
    }

    public function managePTS(){
        return view('admin.pts');
    }

    public function manageWTS(){
        return view('admin.wts');
    }

}
