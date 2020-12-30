<?php

namespace App;

use App\Member;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role', 'phone_num', 'email', 'image', 'password', 'ban_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function member_ban($id)
    {
        $ban = Member::where('id', $id)->first('ban_status');
        $ban_status = substr($ban, 15,-2);

        return $ban_status;

    }
    public function auth_member_ban()
    {
        if(auth()->user()->role == "Member"){

            $ban = Member::where('id', auth()->user()->id)->first('ban_status');
            $ban_status = substr($ban, 15,-2);

            return $ban_status;
        }
        return "Not Banned";
    }
    public function member_until($id)
    {
        $member_until = Member::where('id', $id)->first('member_until');
        $until = substr($member_until, 17,-2);

        return $until;
    }


}
