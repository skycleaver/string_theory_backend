<?php

namespace App\Http\Controllers;

use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordTypes\ChordType;
use Chords\ChordTypes\ChordTypeValues;
use Chords\GetChord;
use Fingerings\GetFingerings;
use Formatters\FingeringsFormatter;
use Illuminate\Http\Request;
use Notes\Note;
use Notes\NoteValues;

class FingeringsController
{
    /**
     * @var GetFingerings
     */
    private $getFingerings;
    /**
     * @var FingeringsFormatter
     */
    private $fingeringsFormatter;

    public function __construct(
        GetFingerings $getFingerings,
        FingeringsFormatter $fingeringsFormatter
    )
    {
        $this->getFingerings = $getFingerings;
        $this->fingeringsFormatter = $fingeringsFormatter;
    }

    public function getFingerings(Request $request)
    {

        $chordRoot = $request->get('chord_root', 'c');
        $chordType = $request->get('chord_type', ChordTypeValues::MAJOR);
        $chordSeventh = $request->get('chord_seventh');

        $getChord = new GetChord();
        $chord = $getChord->getChord(
            new Note($chordRoot),
            new ChordType($chordType),
            $chordSeventh ? new ChordSeventh($chordSeventh) : null
        );

        $fingerings = $this->getFingerings->getFingerings($chord);

        return response()->json(
            [
                "fingerings" => $this->fingeringsFormatter->get($fingerings)
            ]
        )->withCallback($request->input('callback'));
    }
}