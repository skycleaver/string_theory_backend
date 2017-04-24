<?php

namespace Chords;

use Chords\ChordNotes\ChordNotesFactory;
use Chords\ChordNotes\ChordNotesInterface;
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
    /**
     * @var ChordNotesInterface
     */
    private $chordNotes;

    public function __construct(
        Note $rootNote,
        ChordType $chordType,
        ChordSeventh $chordSeventh = null
    )
    {
        $this->chordType = $chordType;
        $this->chordSeventh = $chordSeventh;
        $this->chordNotes = ChordNotesFactory::build($chordType, $rootNote, $chordSeventh);
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

    public function fourthNote()
    {
        return $this->chordNotes->fourthNote();
    }

    public function hasNote(Note $note): bool
    {
        $itHasIt = $note->value() === $this->rootNote()->value()
            || $note->value() === $this->secondNote()->value()
            || $note->value() === $this->thirdNote()->value();
        if (!is_null($this->fourthNote())) {
            if ($note->value() === $this->fourthNote()->value()) {
                $itHasIt = true;
            }
        }

        return $itHasIt;
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