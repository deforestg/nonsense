<?php

/**
  * @see https://www.youtube.com/watch?v=bZe5J8SVCYQ
  */

class Missle extends Nonsense
{

    const KNOWS_WHERE_IT_IS = true;

    public function howDoesItKnow()
    {
        $deviation = ($this->whereItis - $this->whereItIsnt > $this->whereItIsnt - $this->whereItis) ? $this->whereItis - $this->whereItIsnt : $this->whereItIsnt - $this->whereItis;
        $whereItWasnt = $this->drive($deviation, $this->whereItis, $this->whereItIsnt); // where it now is
        $this->positionThatItIs = $this->positionThatItWasnt;
        $this->positionThatItWas = $this->positionThatItIsnt;

        if ($this->positionThatItsIn != $this->positionThatItWasnt) {
            $this->variation = $this->positionThatItsIn - $this->positionThatItWasnt;
            $this->acquire($this->variation);
            if ($this->variation >= SIGNIFICANT_FACTOR) {
                $this->gea->correct($this->variation);
            }

            $this->error = $this->deviationAndVariation = ($this->whereItWasnt - $this->whereItShouldBe) - ($this->whereItShouldntBe + $this->whereItWas);
        }
    }
}
