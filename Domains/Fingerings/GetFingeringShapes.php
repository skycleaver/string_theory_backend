<?php

namespace Fingerings;

use Chords\ChordTypes\ChordType;
use Chords\ChordTypes\ChordTypeValues;
use Notes\NoteValues;

class GetFingeringShapes
{
    public function getFingeringShapes(ChordType $chordType) {
        switch ($chordType->value()) {
            case ChordTypeValues::MAJOR:
                return [
                    ['X', '3', '2', '0', '1', '0', NoteValues::C],
                    ['X', '0', '2', '2', '2', '0', NoteValues::A],
                    ['0', '2', '2', '1', '0', '0', NoteValues::E],
                    ['3', '2', '0', '0', '0', '3', NoteValues::G]
                ];
        }
    }
}