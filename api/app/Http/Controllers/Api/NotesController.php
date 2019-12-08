<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Notes as NotesResource;
use App\Http\Resources\NotesCollection;
use App\Models\Notes;
use Auth;
use App\Http\Requests\CreateNoteRequest;
use App\Http\Requests\UpdateNoteRequest;

class NotesController extends Controller
{
	/**
	 * Return all notes that we have stored in the DB
	 *
	 * @return NotesCollection
	 */
    public function notes()
    {
    	// pull all the notes
    	return new NotesCollection(Notes::all());
    }

    /**
     * Create a note
     *
     * @param CreateNoteRequest  $request  The request
     *
     * @return NotesResource
     */
    public function create(CreateNoteRequest $request)
    {
    	// by this point validation should be valid. insert
    	return new NotesResource(Notes::create($request->all()));
    }

    /**
     * Update note
     *
     * @param      \App\Http\Requests\CreateNoteRequest  $request  The request
     * @param      \App\Models\Notes                     $notes    The notes
     */
    public function update(UpdateNoteRequest $request, Notes $notes)
    {
    	// by this point we should be able to update
    	$notes->update($request->all());

    	return new NotesResource($notes);
    }
}
