<?php

namespace Chords\ChordSevenths;

class ChordSeventh
{

    /**
     * @var string
     */
    private $chordSeventh;

    public function __construct(string $chordSeventh)
    {
        $chordSeventhValues = new ChordSeventhValues();
        if (!$chordSeventhValues->contains($chordSeventh)) {
            throw new \Exception('Unrecognized chord type: ' . $chordSeventh);
        }
        $this->chordSeventh = $chordSeventh;
    }

    public function value(): string
    {
        return $this->chordSeventh;
    }
}