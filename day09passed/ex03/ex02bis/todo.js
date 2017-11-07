function AddToDo() {
    var item = prompt("Enter new todo", "");

    if (item.trim() != "") {
        var old = $("#ft_list").eq(0).html();
        $("#ft_list").eq(0).html("<div onclick='RemoveToDo.call(this)'>" + item + '\n' + "</div>" + old);
        var list = $("#ft_list").eq(0).text().trim().split("\n").join(",");
        document.cookie = "items="+list+"; expires=Thu, 29 Sep 2016 12:00:00 UTC";
    }
    else
        alert("Entered empty TODO");
}

function LoadToDos() {
    var items = document.cookie;
    var div = $("#ft_list");
    items = items.split("=");
    if (items.length > 1) {
        items = items[1].split(",");
        for (var i = items.length; i > 0; i--) {
            div.eq(0).html("<div onclick='RemoveToDo.call(this)'>" + items[i - 1] + '\n' + "</div>" + div.eq(0).html());
        }
    }
}

function RemoveToDo() {
    var ans = confirm("Are you sure you want to remove this TODO?");
    if (ans == true) {
        var exclude = this.innerText;
        var items = document.cookie;
        var new_items = "";
        items = items.trim().split("=");
        $("#ft_list").eq(0).html("");
        if (items.length > 1) {
            items = items[1].split(",");
            for (var i = items.length; i > 0; i--) {
                if (items[i - 1] != exclude) {
                    $("#ft_list").eq(0).html("<div onclick='RemoveToDo.call(this)'>" + items[i - 1] + '\n' + "</div>" + $("#ft_list").eq(0).html());
                    if (i > 1)
                        new_items = new_items + items[i - 1] + ",";
                    else
                        new_items = new_items + items[i - 1];
                }
            }
        }
        new_items = new_items.split(",").reverse().join(",");
        document.cookie = "items=" + new_items;
    }
}

$(document).ready(function(){
    $("#btn").click(AddToDo);
    $("#content").ready(LoadToDos);
});