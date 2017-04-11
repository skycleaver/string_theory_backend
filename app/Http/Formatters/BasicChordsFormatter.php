<?php

namespace Formatters;

use Chords\Chord;

class BasicChordsFormatter
{
    /**
     * @var BasicChordFormatter
     */
    private $basicChordFormatter;

    public function __construct()
    {
        $this->basicChordFormatter = new BasicChordFormatter();
    }

    public function get(array $chords): array
    {
        $chordsFormatted = [];
        foreach ($chords as $chord) {
            /** @var Chord $chord */
            $chordFormatted = [
                'chord_root' => $chord->rootNote()->value(),
                'chord_type' => $chord->chordType(),
                'chord' => $this->basicChordFormatter->get($chord),
            ];
            $chordsFormatted[] = $chordFormatted;
        }
        return $chordsFormatted;
    }
}