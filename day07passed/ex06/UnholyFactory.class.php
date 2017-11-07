<?php

class UnholyFactory
{
    public $fighters;
    public $absorbed;

    public function __construct()
    {
        $this->fighters = array();
        $this->absorbed = array();
    }

    public function absorb($fighter)
    {
        if (is_a($fighter, "Fighter") == true)
        {
            $type = $fighter->getType();
            if (in_array($type, $this->absorbed) == false)
            {
                array_push($this->fighters, $fighter);
                array_push($this->absorbed, $type);
                printf("(Factory absorbed a fighter of type %s)%s", $type, PHP_EOL);
            }
            else
                printf("(Factory already absorbed a fighter of type %s)%s", $type, PHP_EOL);
        }
        else
            echo "(Factory can't absorb this, it's not a fighter)".PHP_EOL;
    }

    public function fabricate($fighter)
    {
        if (in_array($fighter, $this->absorbed) == true)
        {
            foreach ($this->fighters as $fs) {
                if ($fs->getType() == $fighter)
                {
                    printf("(Factory fabricates a fighter of type %s)%s", $fs->getType(), PHP_EOL);
                    return $fs;
                }
            }
        }
        else
            printf("(Factory hasn't absorbed any fighter of type %s)%s", $fighter, PHP_EOL);
    }
}

?>
