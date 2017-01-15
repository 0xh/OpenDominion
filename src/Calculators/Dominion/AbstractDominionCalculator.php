<?php

namespace OpenDominion\Calculators\Dominion;

use OpenDominion\Models\Dominion;
use OpenDominion\Traits\DominionAwareTrait;

abstract class AbstractDominionCalculator
{
    use DominionAwareTrait;

//    public function __construct(Dominion $dominion)
//    {
//        $this->setDominion($dominion);
//    }

    /**
     * Initializes the calculator class and resolves its dependencies.
     *
     * @param Dominion $dominion
     */
    public function init(Dominion $dominion)
    {
        $this->setDominion($dominion);
    }
}
