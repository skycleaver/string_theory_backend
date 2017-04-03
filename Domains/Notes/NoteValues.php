<?php

namespace Notes;

class NoteValues
{
    private $notes = [
        'c',
        'c#',
        'd',
        'd#',
        'e',
        'f',
        'f#',
        'g',
        'g#',
        'a',
        'a#',
        'b'
    ];

    public function getNotesAsArray(): array
    {
        return $this->notes;
    }

    public function contains(string $note): bool
    {
        return in_array($note, $this->notes);
    }

    public function getNoteValue(int $position): string
    {
        if ($position < 0 || $position > count($this->notes)) {
            throw new \Exception('Tried to get note in unrecognized position ' . $position);
        }

        return $this->notes[$position];
    }

    public function getPositionOfNote(string $note)
    {
        if (!$this->contains($note)) {
            throw new \Exception('Tried to get position of unrecognized note ' . $note);
        }
        $notesFlipped = array_flip($this->notes);

        return $notesFlipped[$note];
    }

}