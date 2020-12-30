<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Member;
use Auth;
use Carbon\Carbon;

class UsersController extends Controller
{

    public function create()
    {
        return view('admin.registerUsers');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'role' => 'required|string',
            'phone_num' => 'required|string',
            'email' => 'required|unique:users|string|email',
            'password' => 'required|string'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->role = Input::get("role");
        $user->phone_num = $request->input('phone_num');
        $user->email = $request->input('email');
        $user->password = Hash::make ($request->input('password'));
        $user->save();

        if(Input::get("role") == "Member"){
            $today = Carbon::today();
            $addOneMonth = $today->add(1, 'month');
            $latestMember = User::where('role', 'member')->latest('id')->first('id');
            $id = substr($latestMember, 6,-1);

            $member = new Member();
            $member->id = $id;
            $member->membership_fees = 150;
            $member->member_until = $addOneMonth;
            $member->ban_status = "Not Banned";
            $member->save();
        }

        return redirect('/admin/dashboard')->with('success', 'Done!');
    }

    public function renewSubscription($id){

        $member = Member::find($id);
        $member->member_until = Input::get("renew");
        $member->save();

        return back()->with('success', 'Membership was renewed for one month successfully!');
    }

    public function update_image(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $imageName = $user->id.'_image'.time().'.'.request()->image->getClientOriginalExtension();
        $request->image->storeAs('/images',$imageName);
        $user->image = $imageName;
        $user->save();

        return back();
    }

    public function updateUserStatus($id)
    {

        $member = Member::find($id);
        $member->ban_status = Input::get("ban_status");
        $member->save();

        return redirect('/admin/users');
    }

}
