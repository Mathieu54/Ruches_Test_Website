
//Ajax request to get beehives
async function getBeehives(){  
    return await new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "./api/getBeehives.php",
            contentType: "application/json",
            dataType: "json",
            success: function(response) {
                resolve(response);
            },
            error: function(response) {
                reject(response);
            }
        });
    });
};

//Ajax request to search a beehives
async function searchBeehives(){  
    return await new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "./api/searchBeehives.php?search=" + searchtext,
            contentType: "application/json",
            dataType: "json",
            success: function(response) {
                resolve(response);
            },
            error: function(response) {
                reject(response);
            }
        });
    });
};

//Ajax request to search a beehives
async function searchBeehivesData(){  
    return await new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "./api/searchBeehivesData.php?search=" + searchtext,
            contentType: "application/json",
            dataType: "json",
            success: function(response) {
                resolve(response);
            },
            error: function(response) {
                reject(response);
            }
        });
    });
};

//Ajax request to get beehives data (humidity, temperature...)
async function getBeehivesData(){  
    return await new Promise((resolve, reject) => {
        $.ajax({
            type: "GET",
            url: "./api/getBeehivesData.php",
            contentType: "application/json",
            dataType: "json",
            success: function(response) {
                resolve(response);
            },
            error: function(response) {
                reject(response);
            }
        });
    });
};

//Ajax request to add beehives
async function addBeehives(){  
    console.log
    return await new Promise((resolve, reject) => {
        $.ajax({
            type: "POST",
            url: "./api/addBeehives.php?name=" + document.getElementById('name_add').value + "&latitude=" + parseFloat(document.getElementById('latitude_add').value) + "&longitude=" + parseFloat(document.getElementById('longitude_add').value),
            contentType: "application/json",
            dataType: "json",
            success: function(response) {
                resolve(response);
            },
            error: function(response) {
                reject(console.log(response));
            }
        });
    });
};

//Ajax request to update beehives
async function updateBeehives(id){  
    return await new Promise((resolve, reject) => {
        $.ajax({
            type: "POST",
            url: "./api/updateBeehives.php?id=" + id + "&name=" + document.getElementById('name_update').value + "&latitude=" + document.getElementById('latitude_update').value + "&longitude=" + document.getElementById('longitude_update').value,
            contentType: "application/json",
            dataType: "json",
            success: function(response) {
                resolve(response);
            },
            error: function(response) {
                reject(response);
            }
        });
    });
};

//Ajax request to delete beehives
async function deleteBeehives(id){  
    return await new Promise((resolve, reject) => {
        $.ajax({
            type: "POST",
            url: "./api/deleteBeehives.php?id=" + id,
            contentType: "application/json",
            dataType: "json",
            success: function(response) {
                resolve(response);
            },
            error: function(response) {
                reject(response);
            }
        });
    });
};

//Function to create the tbody when we have a data
async function createRows(data, beehivesdata) { //Beehivesdata boolean if we get the informations (humidity, temperature) of beehives = true or if boolean is false we get all beehives 
    var tbl = document.getElementById("myTable"); 
    var tbdy = document.createElement('tbody');
    for (var i = 0; i < data.length; i++) {
        var tr = document.createElement('tr');
        if(beehivesdata === true) { //Beehives Data
            var date = new Date(data[i].date); //Transform date to localedatestring
            var formattedDate = date.toLocaleDateString('fr-FR', {
            day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit'
            }); 
            for (var j = 0; j < 5; j++) {
                var td = document.createElement('td'); //Create col with data
                switch(j) {
                    case 0: td.appendChild(document.createTextNode(data[i].name)); break;
                    case 1: td.appendChild(document.createTextNode(formattedDate)); break;
                    case 2: td.appendChild(document.createTextNode(data[i].weight)); break;
                    case 3: td.appendChild(document.createTextNode(data[i].temperature)); break;
                    case 4: td.appendChild(document.createTextNode(data[i].humidity)); break;
                }
                tr.appendChild(td);
            }
            tbdy.appendChild(tr);
            tbl.appendChild(tbdy);
        } else { //List Beehives
            for (var j = 0; j < 4; j++) {
                var td = document.createElement('td');
                var update = document.createElement('a'); /*Create link to delete or modify beehives and add function onclick them*/
                update.setAttribute('href', "#");
                update.setAttribute('onClick', "clickupdatebeehives("+ data[i].id +",'"+ data[i].name +"',"+ data[i].latitude +","+ data[i].longitude +");");
                update.innerText = 'Modifier';
                var deletebee = document.createElement('a');
                deletebee.setAttribute('href', "#");
                deletebee.setAttribute('onClick', "deletebeehives("+ data[i].id +");");
                deletebee.innerText = 'Supprimer';
                switch(j) {
                    case 0: td.appendChild(document.createTextNode(data[i].name)); break;
                    case 1: td.appendChild(document.createTextNode(data[i].latitude)); break;
                    case 2: td.appendChild(document.createTextNode(data[i].longitude)); break;
                    case 3: td.appendChild(update); td.appendChild(document.createTextNode(" / ")); td.appendChild(deletebee); break;
                }
                tr.appendChild(td);
            }
            tbdy.appendChild(tr);
            tbl.appendChild(tbdy);
        }
    }
}