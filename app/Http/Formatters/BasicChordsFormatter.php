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

    public function get(array $chords): string
    {
        $chordsFormatted = [];
        foreach ($chords as $chord) {
            /** @var Chord $chord */
            $chordsFormatted[]['chord_root'] = $chord->rootNote();
            $chordsFormatted[]['chord_type'] = $chord->();
            $chordsFormatted[]['chord'] = $this->basicChordFormatter->get($chord);
        }
        return json_encode($chordsFormatted);
    }
}