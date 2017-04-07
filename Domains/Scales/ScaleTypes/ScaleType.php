<?php

namespace Scales\ScaleTypes;

class ScaleType
{
    /**
     * @var string
     */
    private $scaleType;

    public function __construct(string $scaleType)
    {
        $scaleTypeValues = new ScaleTypeValues();
        if (!$scaleTypeValues->contains($scaleType)) {
            throw new \Exception('Unrecognized scale type: ' . $scaleType);
        }
        $this->scaleType = $scaleType;
    }

    public function value(): string
    {
        return $this->scaleType;
    }
}