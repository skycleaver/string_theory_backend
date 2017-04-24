<?php

namespace Chords\ChordNotes;

use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordTypes\ChordType;
use Chords\ChordTypes\ChordTypeValues;
use Notes\Note;

class ChordNotesFactory
{

    private static $chordNotesByChordTypeValue = [
        ChordTypeValues::MAJOR => MajorChordNotes::class,
        ChordTypeValues::MINOR => MinorChordNotes::class,
        ChordTypeValues::DIMINISHED => DiminishedChordNotes::class,
        ChordTypeValues::SUS2 => Suspended2ChordNotes::class,
        ChordTypeValues::SUS4 => Suspended4ChordNotes::class
    ];

    public static function build(
        ChordType $chordType,
        Note $rootNote,
        ChordSeventh $chordSeventh = null
    ): ChordNotes
    {
        if (!isset(self::$chordNotesByChordTypeValue[$chordType->value()])) {
            throw new \Exception('Unrecognized chord type ' . $chordType->value());
        }
        $className = self::$chordNotesByChordTypeValue[$chordType->value()];

        return new $className($rootNote, $chordSeventh);
    }

}