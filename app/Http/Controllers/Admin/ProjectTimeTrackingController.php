<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectTimeTrackingStoreRequest;
use App\Models\Admin\AdminProject;
use App\Models\ProjectMilestone;
use App\Models\ProjectTasks;
use App\Models\User;
use App\Models\Admin\ProjectTimeTracking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectTimeTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = AdminProject::all();
        $tasks = ProjectTasks::all();
        $milestones = ProjectMilestone::all();
        $staff = User::role(['admin', 'staff'])->get();
        $clients = User::role('client')->get();
        $timeTracking = ProjectTimeTracking::all();
        $totalDuration = 0;
        foreach ($timeTracking as $ttt) {
            $durationParts = explode(':', $ttt->total);
            $hours = isset($durationParts[0]) ? (int) $durationParts[0] : 0;
            $minutes = isset($durationParts[1]) ? (int) $durationParts[1] : 0;
            $totalDuration += $hours * 60 + $minutes;
        }
        $totalHours = floor($totalDuration / 60);
        $totalMinutes = $totalDuration % 60;

        // Unbilled time
        $unbilledTimeTracking = ProjectTimeTracking::where('billed', 0)->get();
        $totalUnbilledDuration = 0;

        foreach ($unbilledTimeTracking as $billedTT) {
            $unbilledDuration = 0; // Initialize the variable inside the loop
            $unbilledDurationParts = explode(':', $billedTT->total);
            $unbilledHours = isset($unbilledDurationParts[0]) ? (int) $unbilledDurationParts[0] : 0;
            $unbilledMinutes = isset($unbilledDurationParts[1]) ? (int) $unbilledDurationParts[1] : 0;
            $unbilledDuration += $unbilledHours * 60 + $unbilledMinutes;

            $totalUnbilledDuration += $unbilledDuration;
        }

        $totalUnbilledHours = floor($totalUnbilledDuration / 60);
        $totalUnbilledMins = $totalUnbilledDuration % 60;

        // Billed time
        $billedTimeTracking = ProjectTimeTracking::where('billed', 1)->get();
        $totalbilledDuration = 0;

        foreach ($billedTimeTracking as $billedTT) {
            $billedDuration = 0; // Initialize the variable inside the loop
            $billedDurationParts = explode(':', $billedTT->total);
            $billedHours = isset($billedDurationParts[0]) ? (int) $billedDurationParts[0] : 0;
            $billedMinutes = isset($billedDurationParts[1]) ? (int) $billedDurationParts[1] : 0;
            $billedDuration += $billedHours * 60 + $billedMinutes;

            $totalbilledDuration += $billedDuration;
        }

        $totalbilledHours = floor($totalbilledDuration / 60);
        $totalbilledMins = $totalbilledDuration % 60;


        return view('admin.pages.projects.time-tracking.index', compact('projects', 'tasks', 'milestones', 'staff', 'clients', 'timeTracking', 'totalHours', 'totalMinutes', 'totalUnbilledHours', 'totalUnbilledMins', 'totalbilledHours', 'totalbilledMins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectTasks = ProjectTasks::all();
        $projectMilestones = ProjectMilestone::all();
        $projects = AdminProject::all();
        $clients = User::role('client')->get();
        return view('admin.pages.projects.time-tracking.create', compact('projectTasks', 'projectMilestones', 'projects', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $totalTime = '';

        if ($request->filled('start_time') && $request->filled('end_time')) {
            $startDateTime = Carbon::createFromFormat('H:i', $request->input('start_time'));
            $endDateTime = Carbon::createFromFormat('H:i', $request->input('end_time'));
            $duration = $endDateTime->diff($startDateTime);
            $hours = $duration->format('%H');
            $minutes = $duration->format('%I');
            $totalTime = $hours . ':' . $minutes;
        }
        elseif($request->filled('time_spent')){
            $totalTime = $request->input('time_spent');
        }


        ProjectTimeTracking::create([
            'project_id' => $request->input('project_id'),
            'task_id' => $request->input('task_id'),
            'milestone_id' => $request->input('milestone_id'),
            'staff_id' => Auth()->user()->id,
            'client_id' => $request->input('client_id'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'time_spent' => $request->input('time_spent'),
            'total' => $totalTime,
            'notes' => $request->input('notes'),
            'billed' => '0',
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has tracked time against project #' . $request->project_id);
        return redirect()->back()->with('success', 'Time tracked successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $timeTracking = ProjectTimeTracking::find($id);

        return view('admin.pages.projects.time-tracking.show', compact('timeTracking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $timeTracking = ProjectTimeTracking::find($id);
        $projectTasks = ProjectTasks::all();
        $projectMilestones = ProjectMilestone::all();
        $projects = AdminProject::all();
        $clients = User::role('client')->get();
        return view('admin.pages.projects.time-tracking.edit', compact('timeTracking', 'projectTasks', 'projectMilestones', 'projects', 'clients'));
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
        $totalTime = '';

        if ($request->filled('start_time') && $request->filled('end_time')) {
            $startDateTime = Carbon::createFromFormat('H:i', $request->input('start_time'));
            $endDateTime = Carbon::createFromFormat('H:i', $request->input('end_time'));
            $duration = $endDateTime->diff($startDateTime);
            $hours = $duration->format('%H');
            $minutes = $duration->format('%I');
            $totalTime = $hours . ':' . $minutes;
        }
        elseif($request->filled('time_spent')){
            $totalTime = $request->input('time_spent');
        }

        $timeTracking = ProjectTimeTracking::find($id);
        $timeTracking->project_id = $request->input('project_id');
        $timeTracking->task_id = $request->input('task_id');
        $timeTracking->milestone_id = $request->input('milestone_id');
        $timeTracking->client_id = $request->input('client_id');
        $timeTracking->start_time = $request->input('start_time');
        $timeTracking->end_time = $request->input('end_time');
        $timeTracking->time_spent = $request->input('time_spent');
        $timeTracking->total = $totalTime;
        $timeTracking->notes = $request->input('notes');
        $timeTracking->billed = $request->input('billed');
        $timeTracking->save();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has edited time tracked for #' . $timeTracking->id);
        return redirect()->back()->with('success', 'Tracked time has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $timeTracking = ProjectTimeTracking::find($id);
        $timeTracking->delete();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted tracked time with ID #' . $timeTracking->id);
        return redirect('admin/projects-time-tracking')->with('success', 'Tracked time deleted successfully');
    }
}
