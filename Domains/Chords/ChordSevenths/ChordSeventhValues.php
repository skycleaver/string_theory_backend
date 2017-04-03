<?php

namespace Chords\ChordSevenths;

use ReflectionClass;

class ChordSeventhValues
{

    const MAJ7 = 'maj7';
    const MIN7 = 'min7';

    public function contains(string $chordSeventh): bool
    {
        return in_array($chordSeventh, $this->getValuesAsArray());
    }

    private function getValuesAsArray(): array {
        $reflectionClass = new ReflectionClass(__CLASS__);
        return $reflectionClass->getConstants();
    }

//    public function getChordSeventhValue(string $key): string
//    {
//        if (!array_key_exists($key, $this->getValuesAsArray())) {
//            throw new \Exception('Tried to get chord seventh with unknown key ' . $key);
//        }
//
//        return $this->$this->getValuesAsArray()[$key];
//    }
}