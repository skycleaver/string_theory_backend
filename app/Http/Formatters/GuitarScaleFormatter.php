<?php

namespace Formatters;


use Notes\Note;
use Notes\NoteValues;
use Scales\Scale;

class GuitarScaleFormatter
{
    public function get(Scale $scale)
    {
        $strings = [
            $this->getString($scale, new Note('e')),
            $this->getString($scale, new Note('a')),
            $this->getString($scale, new Note('d')),
            $this->getString($scale, new Note('g')),
            $this->getString($scale, new Note('b')),
            $this->getString($scale, new Note('e')),
        ];
        return $strings;
    }

    private function getString(Scale $scale, Note $startingNote)
    {
        $noteValues = new NoteValues();

        $startingNotePosition = $noteValues->getPositionOfNote($startingNote->value());
        $scaleRoot = $scale->rootNote();
        $stringLength = 12;
        $string = [];
        for ($i = 0; $i < $stringLength; $i++) {
            $currentNotePosition = ($i + $startingNotePosition) % 12;
            $currentNote = new Note($noteValues->getNoteValue($currentNotePosition));
            if ($scaleRoot->value() === $currentNote->value()) {
                $string[] = strtoupper($currentNote->value());
            } elseif ($scale->hasNote($currentNote)) {
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