<?php

namespace App\Http\Controllers;

use Formatters\BasicScaleFormatter;
use Illuminate\Http\Request;
use Intervals\GetInterval;
use Notes\Note;
use Notes\NoteValues;
use Scales\GetScale;
use Scales\ScaleTypes\ScaleType;
use Scales\ScaleTypes\ScaleTypeValues;

class ScaleController
{

    /**
     * @var BasicScaleFormatter
     */
    private $basicScaleFormatter;

    public function __construct(BasicScaleFormatter $basicScaleFormatter)
    {
        $this->basicScaleFormatter = $basicScaleFormatter;
    }

    public function getScale(Request $request)
    {
        $scaleRoot = $request->get('scale_root', 'c');
        $scaleType = $request->get('scale_name', ScaleTypeValues::MAJOR);

        $getScale = new GetScale(new GetInterval(new NoteValues()));
        $scale = $getScale->getScale(new Note($scaleRoot), new ScaleType($scaleType));

        return response()->json(
            [
                "scale" => $this->basicScaleFormatter->get($scale)
            ]
        )->withCallback($request->input('callback'));
    }
}