<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Notes as NotesResource;
use App\Http\Resources\NotesCollection;

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

    public function create(CreateNoteRequest $request)
    {

    }
}
