<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectMilestoneStoreRequest;
use App\Models\Admin\AdminProject;
use App\Models\ProjectMilestone;
use Illuminate\Http\Request;

class AdminProjectMilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $milestones = ProjectMilestone::all();
        $projects = AdminProject::all();
        return view('admin.pages.projects.milestones.index', compact('milestones', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = AdminProject::all();
        return view('admin.pages.projects.milestones.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectMilestoneStoreRequest $request)
    {
        $milestone = ProjectMilestone::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'description' => $request->input('description'),
            'project_id' => $request->project_id
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created project milestone ' . $request->name . ' for project ' . $request->project_id);
        return redirect()->back()->with('success', 'New project milestone created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $milestone = ProjectMilestone::find($id);
        return view('admin.pages.projects.milestones.show', compact('milestone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $milestone = ProjectMilestone::find($id);
        $projects = AdminProject::all();
        return view('admin.pages.projects.milestones.edit', compact('milestone', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectMilestoneStoreRequest $request, $id)
    {
        $milestone = ProjectMilestone::find($id);
        $milestone->name = $request->name;
        $milestone->start_date = $request->start_date;
        $milestone->due_date = $request->due_date;
        $milestone->description = $request->input('description');
        $milestone->project_id = $request->project_id;
        $milestone->save();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated Project Milestone ' . $request->name . ' for Project #' .$request->project_id );
        return redirect()->back()->with('success', 'Project Milestone updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $milestone = ProjectMilestone::find($id);
        $milestone->delete();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted a project milestone');
        return redirect()->back()->with('success', 'Milestone deleted successfully');
    }
}
