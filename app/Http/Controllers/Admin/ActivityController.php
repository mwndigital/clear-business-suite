<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = Activity::all();
        return view('admin.pages.activity-log.index', compact('activity'));
    }

    public function clearLog() {
        Activity::truncate();
        return redirect()->back()->with('success', 'Activity log has been cleared successfully');
    }


    public function destroy($id)
    {
        //
    }
}
