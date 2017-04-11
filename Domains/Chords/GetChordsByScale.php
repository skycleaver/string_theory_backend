<?php

namespace Chords;

use Chords\ChordTypes\ChordType;
use Chords\ChordTypes\ChordTypeValues;
use Intervals\GetInterval;
use Notes\NoteValues;
use Scales\Scale;
use Scales\ScaleTypes\ScaleTypeValues;

class GetChordsByScale
{
    /**
     * @var GetChord
     */
    private $getChord;

    public function __construct()
    {
        $this->getChord = new GetChord(new GetInterval(new NoteValues()));
    }

    public function get(Scale $scale)
    {
        switch ($scale->scaleType()->value()) {
            case ScaleTypeValues::MAJOR:
                return $this->getMajorScaleChords($scale);
            case ScaleTypeValues::MINOR:
                return $this->getMinorScaleChords($scale);
            default:
                throw new \Exception("Unrecognized scale type: " . $scale->scaleType()->value());
        }
    }

    private function getMajorScaleChords(Scale $scale)
    {
        $chords = [];
        $chords[] = $this->getChord->getChord(
            $scale->rootNote(),
            new ChordType(ChordTypeValues::MAJOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->secondNote(),
            new ChordType(ChordTypeValues::MINOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->thirdNote(),
            new ChordType(ChordTypeValues::MINOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->fourthNote(),
            new ChordType(ChordTypeValues::MAJOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->fifthNote(),
            new ChordType(ChordTypeValues::MAJOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->sixthNote(),
            new ChordType(ChordTypeValues::MINOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->seventhNote(),
            new ChordType(ChordTypeValues::DIMINISHED)
        );

        return $chords;
    }

    private function getMinorScaleChords(Scale $scale)
    {
        $chords = [];
        $chords[] = $this->getChord->getChord(
            $scale->rootNote(),
            new ChordType(ChordTypeValues::MINOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->secondNote(),
            new ChordType(ChordTypeValues::DIMINISHED)
        );
        $chords[] = $this->getChord->getChord(
            $scale->thirdNote(),
            new ChordType(ChordTypeValues::MAJOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->fourthNote(),
            new ChordType(ChordTypeValues::MINOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->fifthNote(),
            new ChordType(ChordTypeValues::MINOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->sixthNote(),
            new ChordType(ChordTypeValues::MAJOR)
        );
        $chords[] = $this->getChord->getChord(
            $scale->seventhNote(),
            new ChordType(ChordTypeValues::MAJOR)
        );
        return $chords;
    }
}