<?php

namespace Fingerings;

use Chords\Chord;
use Chords\ChordTypes\ChordTypeValues;

class GetFingerings
{
    public function getFingerings(Chord $chord) {

        $fingeringShapes = new FingeringShapes();
        $fingeringShapes->getFingeringShapes($chord->chordType());

        switch ($chord->chordType()) {
            case ChordTypeValues::MAJOR:
                return new Fingering();
        }
    }
}