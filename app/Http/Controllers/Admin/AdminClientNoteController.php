<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminClientNoteRequest;
use App\Models\Admin\ClientNote;
use Illuminate\Http\Request;

class AdminClientNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.clients.notes.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminClientNoteRequest $request)
    {
        $clientNote = ClientNote::create([
            'title' => $request->title,
            'the_content' => $request->the_content,
            'user_id' => $request->input('user_id'),
        ]);

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has created a new note for client ' . $request->input('user_id'));

        return redirect()->back()->with('success', 'New note has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientNote = clientNote::where('user_id', $id)->first();
        return view('admin.pages.clients.notes.show', compact('clientNote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminClientNoteRequest $request, $id)
    {
        $clientNote = ClientNote::find($id);
        $clientNote->title = $request->title;
        $clientNote->the_content = $request->the_content;
        $clientNote->user_id = $request->input('user_id');
        $clientNote->save();

        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has updated a note for client ' . $request->input('user_id'));

        return redirect()->back()->with('success', 'New note has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientNote = ClientNote::where('id', $id);
        $clientNote->delete();
        activity()->log(auth()->user()->first_name . ' ' . auth()->user()->last_name . ' has deleted a note for a client');
        return redirect()->back()->with('success', 'Note has been deleted successfully');
    }
}
