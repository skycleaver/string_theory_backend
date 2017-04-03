<?php

namespace Chords\ChordTypes;

class ChordType
{
    /**
     * @var string
     */
    private $chordType;

    public function __construct(string $chordType)
    {
        $chordTypeValues = new ChordTypeValues();
        if (!$chordTypeValues->contains($chordType)) {
            throw new \Exception('Unrecognized chord type: ' . $chordType);
        }
        $this->chordType = $chordType;
    }

    public function value(): string
    {
        return $this->chordType;
    }
}