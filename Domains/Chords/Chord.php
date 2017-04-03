<?php

namespace Chords;

use Notes\Note;

class Chord
{
    /**
     * @var Note
     */
    private $rootNote;
    /**
     * @var Note
     */
    private $secondNote;
    /**
     * @var Note
     */
    private $thirdNote;

    public function __construct(
        Note $rootNote,
        Note $secondNote,
        Note $thirdNote
    )
    {
        $this->rootNote = $rootNote;
        $this->secondNote = $secondNote;
        $this->thirdNote = $thirdNote;
    }

    /**
     * @return Note
     */
    public function rootNote(): Note
    {
        return $this->rootNote;
    }

    /**
     * @return Note
     */
    public function secondNote(): Note
    {
        return $this->secondNote;
    }

    /**
     * @return Note
     */
    public function thirdNote(): Note
    {
        return $this->thirdNote;
    }

    public function hasNote(Note $note): bool
    {
        return $note->value() === $this->rootNote->value()
            || $note->value() === $this->secondNote->value()
            || $note->value() === $this->thirdNote->value();
    }
}