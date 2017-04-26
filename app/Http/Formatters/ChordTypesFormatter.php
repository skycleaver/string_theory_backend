<?php

namespace Formatters;


class ChordTypesFormatter
{
    public function get(array $chordTypes): array
    {
        $formattedChordTypes = [];
        foreach ($chordTypes as $chordType) {
            $formattedChordTypes[] = [
                'value' => $chordType,
                'name' => ucfirst($chordType),
            ];
        }
        return $formattedChordTypes;
    }
}