<?php

require_once ("Lannister.class.php");

class Tyrion extends Lannister
{
    public function sleepWith($person)
    {
        if (is_subclass_of($person, "Lannister") == True)
            echo "Not even if I'm drunk !".PHP_EOL;
        else
            echo "Let's do this.".PHP_EOL;
    }
}

?>
