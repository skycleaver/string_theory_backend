<?php

namespace Formatters;

class BasicScaleNamesFormatter
{
    public function get(array $scaleNames): array
    {
        $formattedScaleNames = [];
        foreach ($scaleNames as $scaleName) {
            $formattedScaleNames[] = [
                'value' => $scaleName,
                'name' => ucfirst($scaleName),
            ];
        }
        return $formattedScaleNames;
    }
}