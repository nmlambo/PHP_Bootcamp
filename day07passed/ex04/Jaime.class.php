<?php

require_once ("Lannister.class.php");

class Jaime extends Lannister
{
    public function sleepWith($person)
    {
        if (is_subclass_of($person, "Lannister") == True)
        {
            if (is_a($person, "Cersei") == True)
                echo "With pleasure, but only in a tower in Winterfell, then.".PHP_EOL;
            else
                echo "Not even if I'm drunk !" . PHP_EOL;
        }
        else
            echo "Let's do this.".PHP_EOL;
    }
}

?>
