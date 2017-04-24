<?php

namespace Chords\ChordNotes;


use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordTypes\ChordType;
use Chords\ChordTypes\ChordTypeValues;
use Notes\Note;

class ChordNotesFactory
{
    public static function build(
        ChordType $chordType,
        Note $rootNote,
        ChordSeventh $chordSeventh = null
    )
    {
        switch ($chordType->value()) {
            case ChordTypeValues::MAJOR:
                return new MajorChordNotes($rootNote, $chordSeventh);
            case ChordTypeValues::MINOR:
                return new MinorChordNotes($rootNote, $chordSeventh);
            case ChordTypeValues::DIMINISHED:
                return new DiminishedChordNotes($rootNote, $chordSeventh);
            case ChordTypeValues::SUS2:
                return new Suspended2ChordNotes($rootNote, $chordSeventh);
            case ChordTypeValues::SUS4:
                return new Suspended4ChordNotes($rootNote, $chordSeventh);
            default:
                throw new \Exception('Unrecognized chord type ' . $chordType->value());
        }
    }

}