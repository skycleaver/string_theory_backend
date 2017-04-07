<?php

namespace Chords;

use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordTypes\ChordType;
use Notes\Note;

class GetChord
{
    public function getChord(
        Note $chordRoot,
        ChordType $chordType,
        ChordSeventh $chordSeventh = null
    ): Chord
    {
        return new Chord(
            $chordRoot,
            $chordType,
            $chordSeventh
        );
    }
}

?>