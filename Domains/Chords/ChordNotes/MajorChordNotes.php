<?php

namespace Chords\ChordNotes;

use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordSevenths\ChordSeventhValues;
use Intervals\GetInterval;
use Notes\Note;
use Notes\NoteValues;

class MajorChordNotes implements ChordNotesInterface
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
            $this->addSeventh($rootNote, $chordSeventh);
        }
    }

    private function addSeventh(Note $rootNote, ChordSeventh $chordSeventh)
    {
        $getInterval = new GetInterval(new NoteValues());

        switch ($chordSeventh->value()) {
            case ChordSeventhValues::MAJ7:
                $this->fourthNote = $getInterval->getMajorSeventh($rootNote);
                break;
            case ChordSeventhValues::MIN7:
                $this->fourthNote = $getInterval->getMinorSeventh($rootNote);
                break;
            default:
                throw new \Exception('Unrecognized seventh type ' . $chordSeventh->value());
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