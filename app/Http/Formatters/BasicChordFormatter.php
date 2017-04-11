<?php

namespace Formatters;

use Chords\Chord;

class BasicChordFormatter
{
    public function get(Chord $chord): string
    {
        $chordFormatted = $chord->rootNote()->value()
            . ' ' . $chord->secondNote()->value()
            . ' ' . $chord->thirdNote()->value();
        if (!is_null($chord->fourthNote())) {
            $chordFormatted .= ' ' . $chord->fourthNote()->value();
        }

        return $chordFormatted;
    }
}