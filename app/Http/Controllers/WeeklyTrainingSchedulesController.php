<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeeklyTrainingSchedule;
use App\CurrentWTS;
use Illuminate\Support\Facades\Input;
use App\User;
use Auth;

class WeeklyTrainingSchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wts = CurrentWTS::orderBy('created_at', 'desc')->get();
        return view('WTS.index')->with('wts', $wts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('WTS.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $this->validate($request, [
            'mondayF' => 'required|string',
            'mondayT' => 'required|string',
            'tuesdayF' => 'required|string',
            'tuesdayT' => 'required|string',
            'wednesdayF' => 'required|string',
            'wednesdayT' => 'required|string',
            'thursdayF' => 'required|string',
            'thursdayT' => 'required|string',
            'fridayF' => 'required|string',
            'fridayT' => 'required|string',

        ]); */

        //Store post
        $wts = new WeeklyTrainingSchedule();
        $wts->coach_id = Auth()->user()->id;
        $wts->coach_name= Auth()->user()->name;
        $wts->monday = Input::get('mondayF') . ' ' . '-' .  ' ' . Input::get('mondayT');
        $wts->tuesday = Input::get('tuesdayF') . ' ' . '-' .  ' ' . Input::get('tuesdayT');
        $wts->wednesday = Input::get('wednesdayF') . ' ' . '-' .  ' ' . Input::get('wednesdayT');
        $wts->thursday = Input::get('thursdayF') . ' ' . '-' .  ' ' . Input::get('thursdayT');
        $wts->friday = Input::get('fridayF') . ' ' . '-' .  ' ' . Input::get('fridayT');
        $wts->saturday = Input::get('saturdayF') . ' ' . '-' .  ' ' . Input::get('saturdayT');
        $wts->sunday = Input::get('sundayF') . ' ' . '-' .  ' ' . Input::get('sundayT');
        $wts->save();

        $currentWTS = CurrentWTS::where('coach_id', '=', Auth()->user()->id)->get();

        if($currentWTS->count() == 0){

            $cwts = new CurrentWTS();
            $cwts->coach_id = Auth()->user()->id;
            $cwts->coach_name= Auth()->user()->name;
            $cwts->monday = Input::get('mondayF') . ' ' . '-' .  ' ' . Input::get('mondayT');
            $cwts->tuesday = Input::get('tuesdayF') . ' ' . '-' .  ' ' . Input::get('tuesdayT');
            $cwts->wednesday = Input::get('wednesdayF') . ' ' . '-' .  ' ' . Input::get('wednesdayT');
            $cwts->thursday = Input::get('thursdayF') . ' ' . '-' .  ' ' . Input::get('thursdayT');
            $cwts->friday = Input::get('fridayF') . ' ' . '-' .  ' ' . Input::get('fridayT');
            $cwts->saturday = Input::get('saturdayF') . ' ' . '-' .  ' ' . Input::get('saturdayT');
            $cwts->sunday = Input::get('sundayF') . ' ' . '-' .  ' ' . Input::get('sundayT');
            $cwts->save();

        }else{

            $user = Auth::user();
            $latestWTS = CurrentWTS::where('coach_id', '=', $user->id)->first();

            $wts = CurrentWTS::find($latestWTS->id);
            $wts->coach_id = Auth()->user()->id;
            $wts->coach_name= Auth()->user()->name;
            $wts->monday = Input::get('mondayF') . ' ' . '-' .  ' ' . Input::get('mondayT');
            $wts->tuesday = Input::get('tuesdayF') . ' ' . '-' .  ' ' . Input::get('tuesdayT');
            $wts->wednesday = Input::get('wednesdayF') . ' ' . '-' .  ' ' . Input::get('wednesdayT');
            $wts->thursday = Input::get('thursdayF') . ' ' . '-' .  ' ' . Input::get('thursdayT');
            $wts->friday = Input::get('fridayF') . ' ' . '-' .  ' ' . Input::get('fridayT');
            $wts->saturday = Input::get('saturdayF') . ' ' . '-' .  ' ' . Input::get('saturdayT');
            $wts->sunday = Input::get('sundayF') . ' ' . '-' .  ' ' . Input::get('sundayT');
            $wts->save();

        }

        return redirect('/home')->with('success', 'Your weekly training schedule was created successfully (:');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wts = CurrentWTS::find($id);
        return view('WTS.show')->with('wts', $wts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
