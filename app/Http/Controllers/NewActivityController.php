<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\View\View;
use App\Models\activity;

class NewActivityController extends Controller
{
    //
    
    public function show($id): View
    {
        $activity = activity::findOrFail($id);
        return view('activity.deleteactivity', compact('activity'));
    }

    public function destroy($id)
    {
        //get post by ID
        $post = activity::findOrFail($id);


        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('activity.index');
    }

    
}
