<?php

namespace Scales\ScaleNotes;

use Intervals\GetInterval;
use Notes\Note;
use Notes\NoteValues;

class MajorScaleNotes implements ScaleNotesInterface
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
    /**
     * @var Note
     */
    private $fifthNote;
    /**
     * @var Note
     */
    private $sixthNote;
    /**
     * @var Note
     */
    private $seventhNote;

    public function __construct(Note $rootNote)
    {
        $getInterval = new GetInterval(new NoteValues());

        $this->rootNote = $rootNote;
        $this->secondNote = $getInterval->getSecond($rootNote);
        $this->thirdNote = $getInterval->getMajorThird($rootNote);
        $this->fourthNote = $getInterval->getFourth($rootNote);
        $this->fifthNote = $getInterval->getFifth($rootNote);
        $this->sixthNote = $getInterval->getMajorSixth($rootNote);
        $this->seventhNote = $getInterval->getMajorSeventh($rootNote);
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

    /**
     * @return Note
     */
    public function fourthNote(): Note
    {
        return $this->fourthNote;
    }

    /**
     * @return Note
     */
    public function fifthNote(): Note
    {
        return $this->fifthNote;
    }

    /**
     * @return Note
     */
    public function sixthNote(): Note
    {
        return $this->sixthNote;
    }

    /**
     * @return Note
     */
    public function seventhNote(): Note
    {
        return $this->seventhNote;
    }

}