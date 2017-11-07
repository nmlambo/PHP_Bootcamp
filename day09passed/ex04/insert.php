<?php

function GetNewId ($content)
{
    $items = explode(",", $content);
    $last = $items[count($items) - 1];
    $parts = explode(";", $last);
    $id = intval($parts[0]);
    return ($id + 1);
}

function SaveToDo ($item)
{
    $content = file_get_contents("list.csv");
    if (trim($content) != "")
    {
        $id = GetNewId($content);
        $content = $content.","."$id;".$item;
        file_put_contents("list.csv", $content);    
    }
    else
        file_put_contents("list.csv", "0;".$item);
}

function AddToDo ()
{
    SaveToDo($_REQUEST["todo"]);
    require("select.php");
}

AddToDo();

?>