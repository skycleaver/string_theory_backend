<?php

namespace Intervals;

use Notes\Note;
use Notes\NoteValues;

class GetInterval
{

    public function __construct(NoteValues $noteValues)
    {
        $this->noteValues = $noteValues;
    }

    public function getMajorThird(Note $chordRoot): Note
    {
        return $this->getNoteBySemiToneDifference($chordRoot, 4);
    }

    public function getMinorThird(Note $chordRoot): Note
    {
        return $this->getNoteBySemiToneDifference($chordRoot, 3);
    }

    public function getFifth(Note $chordRoot): Note
    {
        return $this->getNoteBySemiToneDifference($chordRoot, 7);
    }

    public function getMajorSeventh(Note $chordRoot): Note
    {
        return $this->getNoteBySemiToneDifference($chordRoot, 11);
    }

    public function getMinorSeventh(Note $chordRoot): Note
    {
        return $this->getNoteBySemiToneDifference($chordRoot, 10);
    }

    public function getSecond(Note $chordRoot): Note
    {
        return $this->getNoteBySemiToneDifference($chordRoot, 2);
    }

    public function getFourth(Note $chordRoot): Note
    {
        return $this->getNoteBySemiToneDifference($chordRoot, 5);
    }

    public function getMajorSixth(Note $chordRoot): Note
    {
        return $this->getNoteBySemiToneDifference($chordRoot, 9);
    }

    public function getMinorSixth(Note $chordRoot): Note
    {
        return $this->getNoteBySemiToneDifference($chordRoot, 8);
    }

    private function getNoteBySemiToneDifference(Note $rootNote, int $semiToneDifference): Note
    {
        $chordRootPosition = $this->noteValues->getPositionOfNote($rootNote->value());
        $resultingNotePosition = ($chordRootPosition + $semiToneDifference) % 12;
        $noteValue = $this->noteValues->getNoteValue($resultingNotePosition);

        return new Note($noteValue);
    }
}