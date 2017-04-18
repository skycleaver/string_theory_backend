<?php

namespace Chords\ChordTypes;

use ReflectionClass;

class ChordTypeValues
{

    const MAJOR = 'major';
    const MINOR = 'minor';
    const DIMINISHED = 'diminished';

    public function contains(string $chordType): bool
    {
        return in_array($chordType, $this->getValuesAsArray());
    }

//    public function getChordTypeValue(string $key): string
//    {
//        if (!array_key_exists($key, $this->getValuesAsArray())) {
//            throw new \Exception('Tried to get chord type with unknown key ' . $key);
//        }
//
//        return $this->getValuesAsArray()[$key];
//    }

    public function getValuesAsArray(): array {
        $reflectionClass = new ReflectionClass(__CLASS__);
        return $reflectionClass->getConstants();
    }

}