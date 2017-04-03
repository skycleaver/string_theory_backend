<?php

namespace Formatters;

use Chords\Chord;

class BasicChordFormatter
{
    public function get(Chord $chord): string
    {
        return $chord->rootNote()->value()
            . ' ' . $chord->secondNote()->value()
            . ' ' . $chord->thirdNote()->value();
    }
}