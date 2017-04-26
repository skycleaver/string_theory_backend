<?php

namespace Scales;

use Chords\Chord;
use Notes\Note;
use Scales\ScaleNotes\ScaleNotesFactory;
use Scales\ScaleNotes\ScaleNotesInterface;
use Scales\ScaleTypes\ScaleType;

class Scale
{

    /**
     * @var ScaleType
     */
    private $scaleType;
    /**
     * @var ScaleNotesInterface
     */
    private $scaleNotes;

    public function __construct(
        Note $rootNote,
        ScaleType $scaleType
    )
    {
        $this->scaleType = $scaleType;
        $this->scaleNotes = ScaleNotesFactory::build($scaleType, $rootNote);
    }

    public function rootNote(): Note
    {
        return $this->scaleNotes->rootNote();
    }

    public function secondNote(): Note
    {
        return $this->scaleNotes->secondNote();
    }

    public function thirdNote(): Note
    {
        return $this->scaleNotes->thirdNote();
    }

    public function fourthNote(): Note
    {
        return $this->scaleNotes->fourthNote();
    }

    public function fifthNote(): Note
    {
        return $this->scaleNotes->fifthNote();
    }

    public function sixthNote(): Note
    {
        return $this->scaleNotes->sixthNote();
    }

    public function seventhNote(): Note
    {
        return $this->scaleNotes->seventhNote();
    }

    public function scaleType(): ScaleType
    {
        return $this->scaleType;
    }

    public function hasNote(Note $note): bool
    {
        $scaleNotes = [
            $this->rootNote(),
            $this->secondNote(),
            $this->thirdNote(),
            $this->fourthNote(),
            $this->fifthNote(),
            $this->sixthNote(),
            $this->seventhNote()
        ];
        foreach ($scaleNotes as $scaleNote) {
            if (!is_null($scaleNote)) {
                /** @var Note $scaleNote */
                if ($scaleNote->value() === $note->value()) {
                    return true;
                }
            }
        }

        return false;
    }

    public function hasChord(Chord $chord): bool
    {
        $notes = [
            $chord->rootNote(),
            $chord->secondNote(),
            $chord->thirdNote(),
            $chord->fourthNote()
        ];
        foreach ($notes as $note) {
            if (!is_null($note)) {
                /** @var Note $note */
                if (!$this->hasNote($note)) {
                    return false;
                }
            }
        }

        return true;
    }
}