<?php

namespace Formatters;


class NotesFormatter
{
    public function get(array $notes): array
    {
        $formattedNotes = [];
        foreach ($notes as $note) {
            $formattedNotes[] = [
                'value' => $note,
                'name' => ucfirst($note),
            ];
        }
        return $formattedNotes;
    }
}