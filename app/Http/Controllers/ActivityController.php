<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\activity;


use illuminate\View\View;

class ActivityController extends Controller
{
    //

    public function index(): View
    {
        $activities = activity::all();
        return view('activity.index', compact('activities'));
    }
    public function newpage(): View
    {
        return view('activity.newactivity');
    }

    public function add(Request $request)
    {
        $order = 0;
        if (activity::find(activity::max('activities_order'))==null) {
            $order = 1;
        } else {
            $order = activity::max('activities_order') + 1;
        }
        activity::create([
            'activities_name'     => $request->taskName,
            'activities_date'   => $request->taskDate,
            'activities_order' => $order,
            'activities_status' => 'incomplete'
        ]);
        // $activity = new activity;
        // $activity->activities_name = $request->taskName;
        // $activity->activities_date = $request->taskDate;
        // $activity->save();
        return redirect()->route('activity.index');
    }

    public function show($id): View
    {
        $activity = activity::findOrFail($id);
        return view('activity.editactivity', compact('activity'));
    }

    public function update(Request $request, $id){
        $activity = activity::findOrFail($id);
        $activity->update([
            'activities_name' => $request->taskName,
            'activities_date' => $request->taskDate,
            'activities_status' => $request->taskStatus,
            'activities_end_time' => date('Y-m-d')
        ]);
        return redirect()->route('activity.index');

    }


    public function reload(Request $activities){
        dd($activities->all());
        return redirect()->route('activity.index');

    }
}
