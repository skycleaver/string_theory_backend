<?php

namespace Chords;

use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordSevenths\ChordSeventhValues;
use Chords\ChordTypes\ChordType;
use Chords\ChordTypes\ChordTypeValues;
use Intervals\GetInterval;
use Notes\Note;

class GetChord
{
    /**
     * @var GetInterval
     */
    private $getInterval;

    public function __construct(GetInterval $getInterval)
    {
        $this->getInterval = $getInterval;
    }

    public function getChord(
        Note $chordRoot,
        ChordType $chordType,
        ChordSeventh $chordSeventh = null
    ): Chord
    {
        $chord = $this->getTriadChord($chordRoot, $chordType);
        if (!is_null($chordSeventh)) {
            $chord = $this->getChordWithSeventh(
                $chord->rootNote(),
                $chord->secondNote(),
                $chord->thirdNote(),
                $chordSeventh
            );
        }

        return $chord;
    }

    private function getTriadChord(Note $chordRoot, ChordType $chordType): Chord
    {
        switch ($chordType->value()) {
            case ChordTypeValues::MAJOR:
                return $this->getMajorChord($chordRoot);
            case ChordTypeValues::MINOR:
                return $this->getMinorChord($chordRoot);
            case ChordTypeValues::DIMINISHED:
                return $this->getDiminishedChord($chordRoot);
            default:
                throw new \Exception('Unrecognized chord type ' . $chordType->value());
        }
    }

    private function getMajorChord(Note $chordRoot): Chord
    {
        return new Chord(
            $chordRoot,
            $this->getInterval->getMajorThird($chordRoot),
            $this->getInterval->getFifth($chordRoot)
        );
    }

    private function getMinorChord($chordRoot): Chord
    {
        return new Chord(
            $chordRoot,
            $this->getInterval->getMinorThird($chordRoot),
            $this->getInterval->getFifth($chordRoot)
        );
    }

    private function getDiminishedChord($chordRoot): Chord
    {
        return new Chord(
            $chordRoot,
            $this->getInterval->getMinorThird($chordRoot),
            $this->getInterval->getDiminishedFifth($chordRoot)
        );
    }

    private function getChordWithSeventh(
        Note $chordRoot,
        Note $secondRoot,
        Note $thirdRoot,
        ChordSeventh $chordSeventh
    ): Chord
    {
        switch ($chordSeventh->value()) {
            case ChordSeventhValues::MAJ7:
                return new Chord(
                    $chordRoot,
                    $secondRoot,
                    $thirdRoot,
                    $this->getInterval->getMajorSeventh($chordRoot)
                );
            case ChordSeventhValues::MIN7:
                return new Chord(
                    $chordRoot,
                    $secondRoot,
                    $thirdRoot,
                    $this->getInterval->getMinorSeventh($chordRoot)
                );
            default:
                throw new \Exception('Unrecognized seventh type ' . $chordSeventh->value());
        }
    }

//    private function getChordGuitar($chord)
//    {
//        $chordPieces = explode(' ', $chord);
//
//        $strings = [
//            $this->getString($chordPieces, 'e'),
//            $this->getString($chordPieces, 'a'),
//            $this->getString($chordPieces, 'd'),
//            $this->getString($chordPieces, 'g'),
//            $this->getString($chordPieces, 'b'),
//            $this->getString($chordPieces, 'e'),
//        ];
//        return $strings;
//    }
//
//    private function getString($chordPieces, $startingNote)
//    {
//        $startingNoteOffset = array_flip($this->notes)[$startingNote];
//        $chordRoot = $chordPieces[0];
//        $stringLength = 12;
//        $string = [];
//        for ($i = 0; $i < $stringLength; $i++) {
//            if ($chordRoot === $this->notes[($i + $startingNoteOffset) % 12]) {
//                $string[] = strtoupper($chordRoot);
//            } elseif (in_array($this->notes[($i + $startingNoteOffset) % 12], $chordPieces)) {
//                $string[] = $this->notes[($i + $startingNoteOffset) % 12];
//            } else {
//                if ($i === 0) {
//                    $string[] = 'X';
//                } else {
//                    $string[] = '-';
//                }
//            }
//        }
//        return $string;
//    }
}

?>