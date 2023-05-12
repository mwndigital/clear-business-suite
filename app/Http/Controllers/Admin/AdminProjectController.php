<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Models\Admin\AdminProject;
use App\Models\Admin\ProjectBillingType;
use App\Models\Admin\ProjectStatus;
use App\Models\Admin\ProjectType;
use App\Models\PaymentMethods;
use App\Models\ProjectTasks;
use App\Models\User;
use Illuminate\Http\Request;


class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = AdminProject::all();
        return view('admin.pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = User::role('client')->get();
        $projectTypes = ProjectType::all();
        $projectStatuses = ProjectStatus::all();
        $billingType = ProjectBillingType::all();
        return view('admin.pages.projects.create', compact('clients', 'projectTypes', 'projectStatuses', 'billingType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        AdminProject::create([
            'name' => $request->name,
            'project_type' => $request->project_type,
            'project_status' => $request->project_status,
            'progress' => $request->input('progress'),
            'billing_type' => $request->billing_type,
            'total_rate' => $request->input('total_rate'),
            'rate_per_hour' => $request->input('rate_per_hour'),
            'estimated_hours' => $request->input('estimated_hours'),
            'start_date' => $request->start_date,
            'due_date' => $request->input('due_date'),
            'description' => $request->input('description'),
            'user_id' => $request->input('user_id'),
            'project_notes_id' => $request->input('project_notes_id'),
            'project_tasks_id' => $request->input('project_tasks_id'),
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' created project ' . $request->name);
        return redirect('admin/projects')->with('success', 'New project created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = AdminProject::find($id);
        $allProjects = AdminProject::all();
        $projectTasks = ProjectTasks::where('project_id', $id)->get();
        return view('admin.pages.projects.show', compact('project', 'allProjects', 'projectTasks'));
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
