<?php

namespace Chords\ChordNotes;

use Notes\Note;

interface ChordNotesInterface
{
    public function rootNote(): Note;

    public function secondNote(): Note;

    public function thirdNote(): Note;

    public function fourthNote();
}