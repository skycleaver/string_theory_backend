<?php

namespace Scales;

use Intervals\GetInterval;
use Notes\Note;
use Scales\ScaleTypes\ScaleType;

class GetScale
{

    /**
     * @var GetInterval
     */
    private $getInterval;

    public function __construct(GetInterval $getInterval)
    {
        $this->getInterval = $getInterval;
    }

    public function getScale(Note $scaleRoot, ScaleType $scaleType): Scale
    {
        return new Scale($scaleRoot, $scaleType);
    }
}