<?php

namespace Notes;

class Note
{
    /**
     * @var string
     */
    private $note;

    public function __construct(string $note)
    {
        $noteValues = new NoteValues();
        if (!$noteValues->contains($note)) {
            throw new \Exception('Unrecognized note: ' . $note);
        }
        $this->note = $note;
    }

    public function value(): string
    {
        return $this->note;
    }
}