<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectNoteStoreRequest;
use App\Models\Admin\AdminProject;
use App\Models\ProjectNotes;
use Illuminate\Http\Request;

class AdminProjectNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = ProjectNotes::all();
        $projects = AdminProject::all();
        return view('admin.pages.projects.notes.index', compact('notes', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = AdminProject::all();
        return view('admin.pages.projects.notes.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectNoteStoreRequest $request)
    {
        ProjectNotes::create([
            'title' => $request->title,
            'the_content' => $request->the_content,
            'show_to_client' => $request->show_to_client,
            'project_id' => $request->project_id,
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created a project note ' . $request->title . ' for project #' . $request->project_id);
        return redirect()->back()->with('success', 'Project note has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = ProjectNotes::find($id);

        return view('admin.pages.projects.notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = ProjectNotes::find($id);
        $projects = Adminproject::all();
        return view('admin.pages.projects.notes.edit', compact('note', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectNoteStoreRequest $request, $id)
    {
        $note = ProjectNotes::find($id);
        $note->title = $request->title;
        $note->the_content = $request->the_content;
        $note->show_to_client = $request->show_to_client;
        $note->project_id = $request->project_id;
        $note->save();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated project note ' . $request->title . ' for project #' . $request->project_id);
        return redirect()->back()->with('success', 'Project note has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = ProjectNotes::find($id);
        $note->delete();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted note ' . $note->title);
        return redirect()->back()->with('success', 'Project note has been deleted successfully');
    }
}
