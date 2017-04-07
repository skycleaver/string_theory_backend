<?php

namespace Scales;

use Notes\Note;

class Scale
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

    public function __construct(
        Note $rootNote,
        Note $secondNote,
        Note $thirdNote,
        Note $fourthNote,
        Note $fifthNote,
        Note $sixthNote,
        Note $seventhNote
    )
    {
        $this->rootNote = $rootNote;
        $this->secondNote = $secondNote;
        $this->thirdNote = $thirdNote;
        $this->fourthNote = $fourthNote;
        $this->fifthNote = $fifthNote;
        $this->sixthNote = $sixthNote;
        $this->seventhNote = $seventhNote;
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