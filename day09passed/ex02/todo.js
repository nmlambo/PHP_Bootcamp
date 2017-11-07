function AddToDo() {
    var item = prompt("Enter new todo", "");

    if (item.trim() != "") {
        var old = document.getElementById("ft_list").innerHTML;
        document.getElementById("ft_list").innerHTML = "<div onclick='RemoveToDo.call(this)'>" + item + "</div>" + old;
        var list = document.getElementById("ft_list").innerText.trim().split("\n").join(",");
        document.cookie = "items="+list+"; expires=Thu, 29 Sep 2016 12:00:00 UTC";
    }
    else
        alert("Entered empty TODO");
}

function LoadToDos() {
    var items = document.cookie;
    items = items.split("=");
    if (items.length > 1) {
        items = items[1].split(",");
        for (var i = items.length; i > 0; i--) {
            document.getElementById("ft_list").innerHTML = "<div onclick='RemoveToDo.call(this)'>" + items[i - 1] + "</div>" + document.getElementById("ft_list").innerHTML;
        }
    }
}

function RemoveToDo() {
    var ans = confirm("Are you sure you want to remove this TODO?");
    if (ans == true) {
        var exclude = this.innerText;
        var items = document.cookie;
        var new_items = "";
        items = items.split("=");
        document.getElementById("ft_list").innerHTML = "";
        if (items.length > 1) {
            items = items[1].split(",");
            for (var i = items.length; i > 0; i--) {
                if (items[i - 1] != exclude) {
                    document.getElementById("ft_list").innerHTML = "<div onclick='RemoveToDo.call(this)'>" + items[i - 1] + "</div>" + document.getElementById("ft_list").innerHTML;
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