<?php

namespace Scales\ScaleNotes;


use Notes\Note;
use Scales\ScaleTypes\ScaleType;
use Scales\ScaleTypes\ScaleTypeValues;

class ScaleNotesFactory
{
    private static $scaleNotesByScaleTypeValue = [
        ScaleTypeValues::MAJOR => MajorScaleNotes::class,
        ScaleTypeValues::MINOR => MinorScaleNotes::class,
    ];

    public static function build(
        ScaleType $scaleType,
        Note $rootNote
    ): ScaleNotesInterface
    {
        if (!isset(self::$scaleNotesByScaleTypeValue[$scaleType->value()])) {
            throw new \Exception('Unrecognized scale type ' . $scaleType->value());
        }
        $className = self::$scaleNotesByScaleTypeValue[$scaleType->value()];

        return new $className($rootNote);
    }
}