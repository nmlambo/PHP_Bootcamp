$(document).ready(function ()
{

    function AddToDo ()
    {
        var item;

        item = prompt("Enter a new todo item");
        if (item.trim() != "")
            $("#ft_list").load("insert.php", {"todo" : item});
        else
            alert("An empty todo item cannot be added");
    }
    
    function RemoveToDo (event)
    {
        if (confirm("Are you sure you want to remove this item?") == true)
            $("#ft_list").load("delete.php", {"todo" : $(event.target).attr('id')});
    }
    
    $("#ft_list").load("select.php");
    $("#ft_list").click(RemoveToDo);
    $("#btnNew").click(AddToDo);

});