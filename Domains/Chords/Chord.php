<?php

namespace Chords;

use Chords\ChordNotes\ChordNotes;
use Chords\ChordNotes\ChordNotesInterface;
use Chords\ChordNotes\DiminishedChordNotes;
use Chords\ChordNotes\MajorChordNotes;
use Chords\ChordNotes\MinorChordNotes;
use Chords\ChordNotes\Suspended2ChordNotes;
use Chords\ChordNotes\Suspended4ChordNotes;
use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordTypes\ChordType;
use Chords\ChordTypes\ChordTypeValues;
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
        if ($chordType->value() === ChordTypeValues::MAJOR) {
            $this->chordNotes = new MajorChordNotes($rootNote, $chordSeventh);
        } elseif ($chordType->value() === ChordTypeValues::MINOR) {
            $this->chordNotes = new MinorChordNotes($rootNote, $chordSeventh);
        } elseif ($chordType->value() === ChordTypeValues::DIMINISHED) {
            $this->chordNotes = new DiminishedChordNotes($rootNote, $chordSeventh);
        } elseif ($chordType->value() === ChordTypeValues::SUS2) {
            $this->chordNotes = new Suspended2ChordNotes($rootNote, $chordSeventh);
        } elseif ($chordType->value() === ChordTypeValues::SUS4) {
            $this->chordNotes = new Suspended4ChordNotes($rootNote, $chordSeventh);
        } else {
            $this->chordNotes = new ChordNotes($rootNote, $chordType, $chordSeventh);
        }
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