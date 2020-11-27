<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PrivateTrainingSession;
use Mail;

class PrivateTrainingSessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $coaches = User::where('role', '=', 'coach')->get();
        return view('PTS.index')->with('coaches', $coaches); */
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coach = User::find($id);
        return view('PTS.show')->with('coach', $coach);
    }


    public function notifyCoach(Request $request, $id)
    {
        $coach = User::find($id);
        $date = substr($request->input('datetime'), 0,-8);
        $time = substr($request->input('datetime'), 10);

        $data = [
            'coach_name' => $coach->name,
            'date' => $date,
            'time' => $time,
            'note' => $request->input('note'),
        ];

        $address = $coach->email;
        Mail::send('pts.notifyCoach', ["data"=>$data], function($message) use($address){
            $message->to($address)
            ->subject('A new private training session request');
            $message->from('unbreak.able@gmail.com','UNbreakable');
        });

        if (Mail::failures()) {
            return back()->with('error', 'Something went wrong! Please try again.');
        }else{

            $pts = new PrivateTrainingSession;
            $pts->member_id = $request->input('memberID');
            $pts->member_name = $request->input('memberName');
            $pts->coach_id = $request->input('coachID');
            $pts->coach_name = $request->input('coachName');
            $pts->session_datetime = $request->input('datetime');
            $pts->note = $request->input('note');
            $pts->status = 'Sent';
            $pts->save();

            return back()->with('success', 'Your request was made successfully!');
        }
   }

   public function notifyMember(Request $request, $id)
    {
        $member = User::find($request->input('member_id'));
        $data = [
            'member_name' => $member->name,
            'status' => $request->input('status'),
        ];

        $address = $member->email;
        Mail::send('pts.notifyMember', ["data"=>$data], function($message) use($address){
            $message->to($address)
            ->subject('Private Training Session Respond');
            $message->from('unbreak.able@gmail.com','UNbreakable');
        });

        if (Mail::failures()) {
            return back()->with('error', 'Something went wrong! Please try again.');
        }else{

            $pts = PrivateTrainingSession::find($id);
            $pts->status = $request->input('status');
            $pts->save();

            return back()->with('success', 'A respond has been sent successfully!');
        }
   }
}
