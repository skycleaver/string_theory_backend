<?php

namespace Formatters;

class ScaleNamesFormatter
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