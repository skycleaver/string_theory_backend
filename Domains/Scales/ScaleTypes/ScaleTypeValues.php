<?php

namespace Scales\ScaleTypes;

use ReflectionClass;

class ScaleTypeValues
{
    const MAJOR = 'major';
    const MINOR = 'minor';
    const BLUES = 'blues';

    public function contains(string $chordType): bool
    {
        return in_array($chordType, $this->getValuesAsArray());
    }

    public function getValuesAsArray(): array
    {
        $reflectionClass = new ReflectionClass(__CLASS__);
        return $reflectionClass->getConstants();
    }
}