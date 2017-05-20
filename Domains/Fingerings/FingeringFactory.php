<?php

namespace Fingerings;


class FingeringFactory
{
    public static function build(array $fingeringShape, int $intervalToAdd)
    {
        return new Fingering(
            $fingeringShape[0] === 'X' ? null : $fingeringShape[0] + $intervalToAdd,
            $fingeringShape[1] === 'X' ? null : $fingeringShape[1] + $intervalToAdd,
            $fingeringShape[2] === 'X' ? null : $fingeringShape[2] + $intervalToAdd,
            $fingeringShape[3] === 'X' ? null : $fingeringShape[3] + $intervalToAdd,
            $fingeringShape[4] === 'X' ? null : $fingeringShape[4] + $intervalToAdd,
            $fingeringShape[5] === 'X' ? null : $fingeringShape[5] + $intervalToAdd
        );
    }
}