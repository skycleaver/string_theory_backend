<?php

namespace Chords\ChordNotes;

use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordSevenths\ChordSeventhValues;
use Chords\ChordTypes\ChordType;
use Chords\ChordTypes\ChordTypeValues;
use Intervals\GetInterval;
use Notes\Note;
use Notes\NoteValues;

class ChordNotes
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
     * @var Note
     */
    private $fourthNote;

    public function __construct(
        Note $rootNote,
        ChordType $chordType,
        ChordSeventh $chordSeventh = null
    )
    {
        $this->getInterval = new GetInterval(new NoteValues());
        switch ($chordType->value()) {
            case ChordTypeValues::MAJOR:
                $this->getMajorChord($rootNote);
                break;
            case ChordTypeValues::MINOR:
                $this->getMinorChord($rootNote);
                break;
            case ChordTypeValues::DIMINISHED:
                $this->getDiminishedChord($rootNote);
                break;
            default:
                throw new \Exception('Unrecognized chord type ' . $chordType->value());
        }
        if (!is_null($chordSeventh)) {
            $this->addSeventh($rootNote, $chordSeventh);
        }
    }

    private function getMajorChord(Note $chordRoot)
    {
        $this->rootNote = $chordRoot;
        $this->secondNote = $this->getInterval->getMajorThird($chordRoot);
        $this->thirdNote = $this->getInterval->getFifth($chordRoot);
    }

    private function getMinorChord($chordRoot)
    {
        $this->rootNote = $chordRoot;
        $this->secondNote = $this->getInterval->getMinorThird($chordRoot);
        $this->thirdNote = $this->getInterval->getFifth($chordRoot);
    }

    private function getDiminishedChord($chordRoot)
    {
        $this->rootNote = $chordRoot;
        $this->secondNote = $this->getInterval->getMinorThird($chordRoot);
        $this->thirdNote = $this->getInterval->getDiminishedFifth($chordRoot);
    }

    private function addSeventh(Note $rootNote, ChordSeventh $chordSeventh)
    {
        switch ($chordSeventh->value()) {
            case ChordSeventhValues::MAJ7:
                $this->fourthNote = $this->getInterval->getMajorSeventh($rootNote);
                break;
            case ChordSeventhValues::MIN7:
                $this->fourthNote = $this->getInterval->getMinorSeventh($rootNote);
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