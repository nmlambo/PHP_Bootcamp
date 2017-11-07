<?php

require_once ("IFighter.class.php");

class NightsWatch implements IFighter
{
    public $fighters;

    public function __construct()
    {
        $this->fighters = array();
    }

    public function recruit($fighter)
    {
        array_push($this->fighters, $fighter);
    }

    public function fight()
    {
        foreach ($this->fighters as $fighter)
        {
            $i = class_implements($fighter);
            $t = false;
            foreach ($i as $is)
            {
                if ($is == "IFighter")
                    $t = true;
            }
            if ($t == true)
                $fighter->fight();
        }
    }
}

?>
