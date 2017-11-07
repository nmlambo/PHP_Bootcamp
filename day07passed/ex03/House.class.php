<?php

abstract class House
{
    abstract function getHouseName();
    abstract function getHouseMotto();
    abstract function getHouseSeat();

    public function introduce(){
        echo sprintf('House %s of %s : "%s" %s',
            $this->getHouseName(), $this->getHouseSeat(),
            $this->getHouseMotto(), PHP_EOL);
    }
}

?>
