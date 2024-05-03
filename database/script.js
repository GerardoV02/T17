function load(){
    //Setting GET variable, show, to "show"
    $.get("database/select.php",{"table":"colors"}, (data) => {
        $("#content").html(convert(jQuery.parseJSON(data)));
    })
}

function loadAdd(){
    let newName = document.getElementById('newColorName').value.trim();
    let newHex = document.getElementById('newColorHex').value.trim();

    //If newName or newHex is empty
    if(newName === ""){
        alert("Name was not entered!");
        return;
    }

    if(newHex === ""){
        alert("Hex was not entered!");
        return;
    }

    $.get("database/add.php",{"newName":newName, "newHex": newHex }, (data) =>{
        $("#addResult").html(jQuery.parseJSON(data));
    })
}

function convert(json_data) {
    // Get the container element where the table will be inserted
    // Create the table element
    let table = $("<table id = 'db'>");

    // Get the keys (column names) of the first object in the JSON data
    let cols = Object.keys(json_data[0]);

    // Create the header element
    let thead = $("<thead>");
    let tr = $("<tr>");
    $.each(cols, function (i, item) {
        let th = $("<th>");
        th.text(item); // Set the column name as the text of the header cell
        tr.append(th); // Append the header cell to the header row
    });
    thead.append(tr); // Append the header row to the header
    table.append(thead) // Append the header to the table
    // Loop through the JSON data and create table rows
    $.each(json_data, function (i, item) {
        let tr = $("<tr>");

        // Get the values of the current object in the JSON data
        let vals = Object.values(item);

        // Loop through the values and create table cells
        $.each(vals, (i, elem) => {
            let td = $("<td class = 'Cell'>");
            td.text(elem); // Set the value as the text of the table cell
            tr.append(td); // Append the table cell to the table row
        });
        table.append(tr); // Append the table row to the table
    });
    return table; // Append the table to the container element
}