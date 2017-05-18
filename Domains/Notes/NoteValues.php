<?php

namespace Notes;

use ReflectionClass;

class NoteValues
{

    const C = 'c';
    const C_SHARP = 'c#';
    const D = 'd';
    const D_SHARP = 'd#';
    const E = 'e';
    const F = 'f';
    const F_SHARP = 'f#';
    const G = 'g';
    const G_SHARP = 'g#';
    const A = 'a';
    const A_SHARP = 'a#';
    const B_SHARP = 'b';

    public function contains(string $note): bool
    {
        return in_array($note, $this->getValuesAsArray());
    }

    private function getValuesAsArray(): array {
        $reflectionClass = new ReflectionClass(__CLASS__);
        return $reflectionClass->getConstants();
    }

    public function getNotesAsArray(): array
    {
        return $this->getValuesAsArray();
    }

    public function getNoteValue(int $position): string
    {
        $notes = $this->getValuesAsArray();
        if ($position < 0 || $position > count($notes)) {
            throw new \Exception('Tried to get note in unrecognized position ' . $position);
        }

        return array_values($notes)[$position];
    }

    public function getPositionOfNote(string $note)
    {
        if (!$this->contains($note)) {
            throw new \Exception('Tried to get position of unrecognized note ' . $note);
        }
        $notesFlipped = array_flip(array_values($this->getValuesAsArray()));

        return $notesFlipped[$note];
    }

}