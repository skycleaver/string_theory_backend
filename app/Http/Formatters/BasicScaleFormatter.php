<?php

namespace Formatters;

use Scales\Scale;

class BasicScaleFormatter
{
    public function get(Scale $scale): string
    {
        return $scale->rootNote()->value()
            . ' ' . $scale->secondNote()->value()
            . ' ' . $scale->thirdNote()->value()
            . ' ' . $scale->fourthNote()->value()
            . ' ' . $scale->fifthNote()->value()
            . ' ' . $scale->sixthNote()->value()
            . ' ' . $scale->seventhNote()->value();
    }
}