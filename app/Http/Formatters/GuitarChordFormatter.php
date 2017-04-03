<?php

namespace Formatters;

use Chords\Chord;
use Notes\Note;
use Notes\NoteValues;

class GuitarChordFormatter
{
    public function get(Chord $chord)
    {
        $strings = [
            $this->getString($chord, new Note('e')),
            $this->getString($chord, new Note('a')),
            $this->getString($chord, new Note('d')),
            $this->getString($chord, new Note('g')),
            $this->getString($chord, new Note('b')),
            $this->getString($chord, new Note('e')),
        ];
        return $strings;
    }

    private function getString(Chord $chord, Note $startingNote)
    {
        $noteValues = new NoteValues();

        $startingNotePosition = $noteValues->getPositionOfNote($startingNote->value());
        $chordRoot = $chord->rootNote();
        $stringLength = 12;
        $string = [];
        for ($i = 0; $i < $stringLength; $i++) {
            $currentNotePosition = ($i + $startingNotePosition) % 12;
            $currentNote = new Note($noteValues->getNoteValue($currentNotePosition));
            if ($chordRoot->value() === $currentNote->value()) {
                $string[] = strtoupper($currentNote->value());
            } elseif ($chord->hasNote($currentNote)) {
                $string[] = $currentNote->value();
            } else {
                if ($i === 0) {
                    $string[] = 'X';
                } else {
                    $string[] = '-';
                }
            }
        }
        return $string;
    }
}