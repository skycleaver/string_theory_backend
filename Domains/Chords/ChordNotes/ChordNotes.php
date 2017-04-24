<?php

namespace Chords\ChordNotes;


use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordSevenths\ChordSeventhValues;
use Intervals\GetInterval;
use Notes\Note;
use Notes\NoteValues;

class ChordNotes
{
    protected function getSeventh(Note $rootNote, ChordSeventh $chordSeventh): Note
    {
        $getInterval = new GetInterval(new NoteValues());

        switch ($chordSeventh->value()) {
            case ChordSeventhValues::MAJ7:
                return $getInterval->getMajorSeventh($rootNote);
            case ChordSeventhValues::MIN7:
                return $getInterval->getMinorSeventh($rootNote);
            default:
                throw new \Exception('Unrecognized seventh type ' . $chordSeventh->value());
        }
    }
}