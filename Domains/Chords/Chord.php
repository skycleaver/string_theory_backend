<?php

namespace Chords;

use Chords\ChordNotes\ChordNotes;
use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordTypes\ChordType;
use Notes\Note;

class Chord
{
    /**
     * @var ChordType
     */
    private $chordType;
    /**
     * @var ChordSeventh
     */
    private $chordSeventh;

    public function __construct(
        Note $rootNote,
        ChordType $chordType,
        ChordSeventh $chordSeventh = null
    )
    {
        $this->chordType = $chordType;
        $this->chordSeventh = $chordSeventh;
        $this->chordNotes = new ChordNotes($rootNote, $chordType, $chordSeventh);
    }

    public function rootNote(): Note
    {
        return $this->chordNotes->rootNote();
    }

    public function secondNote(): Note
    {
        return $this->chordNotes->secondNote();
    }

    public function thirdNote(): Note
    {
        return $this->chordNotes->thirdNote();
    }

    public function fourthNote(): Note
    {
        return $this->chordNotes->fourthNote();
    }

    public function hasNote(Note $note): bool
    {
        return $note->value() === $this->rootNote()->value()
            || $note->value() === $this->secondNote()->value()
            || $note->value() === $this->thirdNote()->value();
    }

    public function chordType(): string
    {
        return $this->chordType->value();
    }

    public function chordSeventh(): string
    {
        if (is_null($this->chordSeventh)) {
            return '';
        }
        return $this->chordSeventh->value();
    }
}