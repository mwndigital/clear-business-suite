<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectTaskStoreRequest;
use App\Models\Admin\AdminProject;
use App\Models\ProjectTasks;
use Illuminate\Http\Request;

class AdminProjectTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = ProjectTasks::all();
        $projects = AdminProject::all();
        return view('admin.pages.projects.tasks.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = AdminProject::all();
        return view('admin.pages.projects.tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectTaskStoreRequest $request)
    {
        ProjectTasks::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'due_date' => $request->input('due_date'),
            'priority' => $request->input('priority'),
            'description' => $request->description,
            'project_id' => $request->project_id,
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created a new project titled: ' . $request->title);
        return redirect()->back()->with('success', 'New task has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = ProjectTasks::find($id);
        return view('admin.pages.projects.tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = ProjectTasks::find($id);
        $allProjects = AdminProject::all();

        return view('admin.pages.projects.tasks.edit', compact('task', 'allProjects'));
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
        $task = ProjectTasks::find($id);
        $task->title = $request->input('title');
        $task->start_date = $request->input('start_date');
        $task->due_date = $request->input('due_date');
        $task->priority = $request->input('priority');
        $task->description = $request->input('description');
        $task->project_id = $request->input('project_id');
        $task->save();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated task ' . $task->id );
        return redirect()->back()->with('success', 'Task has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = ProjectTasks::find($id);
        $task->delete();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted a task');
        return redirect()->back()->with('success', 'Task has been deleted successfully');

    }
}
