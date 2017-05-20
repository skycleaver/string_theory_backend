<?php

namespace Fingerings;

use Chords\Chord;
use Notes\NoteValues;

class GetFingerings
{
    public function getFingerings(Chord $chord): array
    {
        $getFingeringShapes = new GetFingeringShapes();
        $fingeringShapes = $getFingeringShapes->getFingeringShapes($chord->chordType());

        $fingerings = [];
        foreach ($fingeringShapes as $fingeringShape) {
            $intervalToAdd = $this->getIntervalToAdd(
                $chord->rootNote()->value(),
                $fingeringShape[6]
            );

            $fingerings[] = FingeringFactory::build($fingeringShape, $intervalToAdd);
        }

        return $fingerings;
    }

    private function getIntervalToAdd($chordRootNote, $fingeringRootNote)
    {
        $noteValues = new NoteValues();

        $interval =
            $noteValues->getPositionOfNote($chordRootNote) -
            $noteValues->getPositionOfNote($fingeringRootNote);
        if ($interval < 0) {
            $interval += 12;
        }

        return $interval;
    }
}