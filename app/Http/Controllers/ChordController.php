<?php

namespace App\Http\Controllers;

use Chords\ChordSevenths\ChordSeventh;
use Chords\ChordTypes\ChordType;
use Chords\ChordTypes\ChordTypeValues;
use Chords\GetChord;
use Chords\GetChordsByScale;
use Formatters\BasicChordFormatter;
use Formatters\BasicChordsFormatter;
use Formatters\ChordTypesFormatter;
use Formatters\GuitarChordFormatter;
use Intervals\GetInterval;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Notes\Note;
use Notes\NoteValues;
use Scales\GetScale;
use Scales\Scale;
use Scales\ScaleTypes\ScaleType;
use Scales\ScaleTypes\ScaleTypeValues;

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
    /**
     * @var BasicChordsFormatter
     */
    private $basicChordsFormatter;
    /**
     * @var ChordTypesFormatter
     */
    private $chordTypesFormatter;

    public function __construct(
        BasicChordFormatter $basicChordFormatter,
        GuitarChordFormatter $guitarChordFormatter,
        BasicChordsFormatter $basicChordsFormatter,
        ChordTypesFormatter $chordTypesFormatter
    )
    {
        $this->basicChordFormatter = $basicChordFormatter;
        $this->guitarChordFormatter = $guitarChordFormatter;
        $this->basicChordsFormatter = $basicChordsFormatter;
        $this->chordTypesFormatter = $chordTypesFormatter;
    }

    public function getChord(Request $request)
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

        return response()->json(
            [
                'chord' => $this->basicChordFormatter->get($chord),
                'chord_root' => $chord->rootNote()->value(),
                'chord_type' => $chord->chordType()->value(),
                'chord_seventh' => $chord->chordSeventh()
            ]
        )->withCallback($request->input('callback'));
    }

    public function getChordGuitar(Request $request)
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

        return response()->json(
            [
                'chord_guitar' => $this->guitarChordFormatter->get($chord),
                'chord_root' => $chord->rootNote()->value(),
                'chord_type' => $chord->chordType()->value(),
                'chord_seventh' => $chord->chordSeventh()
            ]
        )->withCallback($request->input('callback'));
    }

    public function getChordsByScale(Request $request)
    {
        $scaleRoot = $request->get('scale_root', 'c');
        $scaleType = $request->get('scale_name', ScaleTypeValues::MAJOR);

        $getScale = new GetScale(new GetInterval(new NoteValues()));
        $scale = $getScale->getScale(new Note($scaleRoot), new ScaleType($scaleType));

        $getChordsByScale = new GetChordsByScale();
        $chords = $getChordsByScale->getMassive($scale);

        return response()->json(
            [
                'chords' => $this->basicChordsFormatter->get($chords)
            ]
        )->withCallback($request->input('callback'));
    }

    public function getChordTypes(Request $request)
    {
        $chordTypeValues = new ChordTypeValues();

        return response()->json(
            [
                "chord_types" => $this->chordTypesFormatter->get(
                    $chordTypeValues->getValuesAsArray()
                )
            ]
        )->withCallback($request->input('callback'));
    }

}
