<?php

namespace Chords\ChordNotes;

use Chords\ChordSevenths\ChordSeventh;
use Intervals\GetInterval;
use Notes\Note;
use Notes\NoteValues;

class MajorChordNotes extends FooChordNotes implements ChordNotesInterface
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
    /**
     * @var Note|null
     */
    private $fourthNote;

    public function __construct(Note $rootNote, ChordSeventh $chordSeventh = null) {

        $getInterval = new GetInterval(new NoteValues());

        $this->rootNote = $rootNote;
        $this->secondNote = $getInterval->getMajorThird($rootNote);
        $this->thirdNote = $getInterval->getFifth($rootNote);
        if (!is_null($chordSeventh)) {
            $this->fourthNote = $this->getSeventh($rootNote, $chordSeventh);
        }
    }

    public function rootNote(): Note
    {
        return $this->rootNote;
    }

    public function secondNote(): Note
    {
        return $this->secondNote;
    }

    public function thirdNote(): Note
    {
        return $this->thirdNote;
    }

    public function fourthNote()
    {
        return $this->fourthNote;
    }

}