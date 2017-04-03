<?php

namespace Chords\ChordSevenths;

class ChordSeventh
{

    /**
     * @var string
     */
    private $chordSeventh;

    public function __construct(string $chordType)
    {
        $chordSeventhValues = new ChordSeventhValues();
        if (!$chordSeventhValues->contains($chordType)) {
            throw new \Exception('Unrecognized chord type: ' . $chordType);
        }
        $this->chordType = $chordType;
    }

    public function value()
    {
        return $this->chordSeventh;
    }
}