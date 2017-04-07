<?php

namespace Scales;

use Intervals\GetInterval;
use Notes\Note;
use Scales\ScaleTypes\ScaleType;
use Scales\ScaleTypes\ScaleTypeValues;

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
        switch ($scaleType->value()) {
            case ScaleTypeValues::MAJOR:
                return $this->getMajorScale($scaleRoot);
            case ScaleTypeValues::MINOR:
                return $this->getMinorScale($scaleRoot);
            default:
                throw new \Exception('Unrecognized scale type ' . $scaleType->value());
        }
    }

    private function getMajorScale(Note $rootNote): Scale
    {
        return new Scale(
            $rootNote,
            $this->getInterval->getSecond($rootNote),
            $this->getInterval->getMajorThird($rootNote),
            $this->getInterval->getFourth($rootNote),
            $this->getInterval->getFifth($rootNote),
            $this->getInterval->getMajorSixth($rootNote),
            $this->getInterval->getMajorSeventh($rootNote)
        );
    }

    private function getMinorScale(Note $rootNote): Scale {
        return new Scale(
            $rootNote,
            $this->getInterval->getSecond($rootNote),
            $this->getInterval->getMinorThird($rootNote),
            $this->getInterval->getFourth($rootNote),
            $this->getInterval->getFifth($rootNote),
            $this->getInterval->getMinorSixth($rootNote),
            $this->getInterval->getMinorSeventh($rootNote)
        );
    }
}