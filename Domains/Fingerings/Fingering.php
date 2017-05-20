<?php

namespace Fingerings;

class Fingering
{
    private $firstStringFret;
    private $secondStringFret;
    private $thirdStringFret;
    private $fourthStringFret;
    private $fifthStringFret;
    private $sixthStringFret;

    public function __construct(
        int $firstStringFret = null,
        int $secondStringFret = null,
        int $thirdStringFret = null,
        int $fourthStringFret = null,
        int $fifthStringFret = null,
        int $sixthStringFret = null
    ) {
        $this->firstStringFret = $firstStringFret;
        $this->secondStringFret = $secondStringFret;
        $this->thirdStringFret = $thirdStringFret;
        $this->fourthStringFret = $fourthStringFret;
        $this->fifthStringFret = $fifthStringFret;
        $this->sixthStringFret = $sixthStringFret;
    }

    public function firstStringFret()
    {
        return $this->firstStringFret;
    }

    public function secondStringFret()
    {
        return $this->secondStringFret;
    }

    public function thirdStringFret()
    {
        return $this->thirdStringFret;
    }

    public function fourthStringFret()
    {
        return $this->fourthStringFret;
    }

    public function fifthStringFret()
    {
        return $this->fifthStringFret;
    }

    public function sixthStringFret()
    {
        return $this->sixthStringFret;
    }
}