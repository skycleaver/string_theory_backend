<?php

namespace Formatters;

use Fingerings\Fingering;

class FingeringsFormatter
{
    public function get(array $fingerings): array
    {
        $formattedFingerings = [];
        foreach ($fingerings as $fingering) {
            /** @var Fingering $fingering */
            $formattedFingerings[] = [
                0 => $fingering->firstStringFret(),
                1 => $fingering->secondStringFret(),
                2 => $fingering->thirdStringFret(),
                3 => $fingering->fourthStringFret(),
                4 => $fingering->fifthStringFret(),
                5 => $fingering->sixthStringFret(),
            ];
        }
        return $formattedFingerings;
    }
}