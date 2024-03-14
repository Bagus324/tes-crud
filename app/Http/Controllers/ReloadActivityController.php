<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\View\View;
use App\Models\activity;

class ReloadActivityController extends Controller
{
    //
    
    public function index(Request $id): View
    {
        dd($id->all()['all']);
        $activity = activity::findOrFail($id);
        return view('activity.index', compact('activity'));
    }


    
}
