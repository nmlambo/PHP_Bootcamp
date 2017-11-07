<?php

function GetId ($item)
{
    return intval(explode(";", $item)[0]);
}

function RemoveToDo ()
{
    $id = intval(explode("_", $_REQUEST["todo"])[1]);
    $content = file_get_contents("list.csv");
    $new_content = array();
    if (trim($content) != "")
    {
        $items = explode(",", $content);
        foreach ($items as $item)
        {
            if ($id != GetId($item))
                array_push($new_content, $item);
        }
        $content = implode(",", $new_content);
        file_put_contents("list.csv", $content);
        require("select.php");
    }
}

RemoveToDo();

?>