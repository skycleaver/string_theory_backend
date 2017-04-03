<?php

namespace App\Http\Controllers;

use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordTypes\ChordType;
use Chords\ChordTypes\ChordTypeValues;
use Chords\GetChord;
use Formatters\BasicChordFormatter;
use Formatters\GuitarChordFormatter;
use Intervals\GetInterval;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Notes\Note;
use Notes\NoteValues;

class ChordController extends BaseController
{
    /**
     * @var BasicChordFormatter
     */
    private $basicChordFormatter;
    /**
     * @var GuitarChordFormatter
     */
    private $guitarChordFormatter;

    public function __construct(
        BasicChordFormatter $basicChordFormatter,
        GuitarChordFormatter $guitarChordFormatter
    )
    {
        $this->basicChordFormatter = $basicChordFormatter;
        $this->guitarChordFormatter = $guitarChordFormatter;
    }

    public function getChord(Request $request)
    {
        $chordRoot = $request->get('chord_root', 'c');
        $chordType = $request->get('chord_type', ChordTypeValues::MAJOR);
        $chordSeventh = $request->get('chord_seventh');

        $getChord = new GetChord(new GetInterval(new NoteValues()));
        $chord = $getChord->getChord(
            new Note($chordRoot),
            new ChordType($chordType),
            $chordSeventh ? new ChordSeventh($chordSeventh) : null
        );

        return response()->json(
            [
                'chord' => $this->basicChordFormatter->get($chord),
                'chord_root' => $chordRoot,
                'chord_type' => $chordType,
                'chord_seventh' => $chordSeventh
            ]
        )->withCallback($request->input('callback'));
    }

    public function getChordGuitar(Request $request)
    {
        $chordRoot = $request->get('chord_root', 'c');
        $chordType = $request->get('chord_type', ChordTypeValues::MAJOR);
        $chordSeventh = $request->get('chord_seventh');

        $getChord = new GetChord(new GetInterval(new NoteValues()));
        $chord = $getChord->getChord(
            new Note($chordRoot),
            new ChordType($chordType),
            $chordSeventh ? new ChordSeventh($chordSeventh) : null
        );

        return response()->json(
            [
                'chord_guitar' => $this->guitarChordFormatter->get($chord),
                'chord_root' => $chordRoot,
                'chord_type' => $chordType,
                'chord_seventh' => $chordSeventh
            ]
        )->withCallback($request->input('callback'));
    }


}
