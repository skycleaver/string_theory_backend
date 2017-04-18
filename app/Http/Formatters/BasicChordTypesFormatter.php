<?php

namespace Formatters;


class BasicChordTypesFormatter
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