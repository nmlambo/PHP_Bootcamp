<?php

function LoadToDos ()
{
    $content = file_get_contents("list.csv");
    if (trim($content) != "")
    {
        $items = explode(",", $content);
        $items = array_reverse($items);
        foreach ($items as $item)
        {
            $components = explode(";", $item);
            $id = intval($components[0]);
            unset($components[0]);
            $todo = implode(";", $components);
            echo "<div id='todo_$id'>".$todo."</div>";
        }
    }
    else 
        echo "";
}

LoadToDos();

?>