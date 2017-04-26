<?php

namespace App\Http\Controllers;

use Formatters\NotesFormatter;
use Illuminate\Http\Request;
use Notes\NoteValues;

class NoteController
{

    /**
     * @var NotesFormatter
     */
    private $notesFormatter;

    public function __construct(NotesFormatter $notesFormatter) {
        $this->notesFormatter = $notesFormatter;
    }

    public function getNotes(Request $request) {
        $noteValues = new NoteValues();
        return response()->json(
            [
                "notes" => $this->notesFormatter->get($noteValues->getNotesAsArray())
            ]
        )->withCallback($request->input('callback'));
    }
}