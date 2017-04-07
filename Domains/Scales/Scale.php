<?php

namespace Scales;

use Notes\Note;
use Scales\ScaleNotes\ScaleNotes;
use Scales\ScaleTypes\ScaleType;

class Scale
{

    /**
     * @var ScaleType
     */
    private $scaleType;
    /**
     * @var ScaleNotes
     */
    private $scaleNotes;

    public function __construct(
        Note $rootNote,
        ScaleType $scaleType
    )
    {
        $this->scaleType = $scaleType;
        $this->scaleNotes = new ScaleNotes($scaleType, $rootNote);
    }

    /**
     * @return Note
     */
    public function rootNote(): Note
    {
        return $this->scaleNotes->rootNote();
    }

    /**
     * @return Note
     */
    public function secondNote(): Note
    {
        return $this->scaleNotes->secondNote();
    }

    /**
     * @return Note
     */
    public function thirdNote(): Note
    {
        return $this->scaleNotes->thirdNote();
    }

    /**
     * @return Note
     */
    public function fourthNote(): Note
    {
        return $this->scaleNotes->fourthNote();
    }

    /**
     * @return Note
     */
    public function fifthNote(): Note
    {
        return $this->scaleNotes->fifthNote();
    }

    /**
     * @return Note
     */
    public function sixthNote(): Note
    {
        return $this->scaleNotes->sixthNote();
    }

    /**
     * @return Note
     */
    public function seventhNote(): Note
    {
        return $this->scaleNotes->seventhNote();
    }

    /**
     * @return ScaleType
     */
    public function scaleType(): ScaleType
    {
        return $this->scaleType;
    }
}