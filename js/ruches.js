let get_ID = null; 
let searchtext = "";
$(document).ready(function() { 
    
    $("#cancelBeehives").click(function() { //Canceled the page of creation or modification
        window.location = "./beehives.php";    //Redirect User
    });

    $("#updateBeehives").click(function() { //Redirect to the page of creation
       get_ID =  params.get('id'); //Get the id in URL
        updateBeehives(get_ID).then((data) => {
            window.location = "./beehives.php"; //When finish redirect user to the list of beehives
        }).catch((error) => {
            console.log(error);
        });   
    });

    $("#addbeehives").click(function() { //Redirect to the page of creation
        window.location = "./form_add.php";    
    });

    /*On CLick Button of the modal to confirm the delete*/
    $("#confirmdelete").click(function() {
        deleteBeehives(get_ID); /*Delete with id*/
        $('#modal_confirm_delete').modal('toggle'); //Disable modal
        var row = document.getElementsByTagName('tbody')[0];
        row.parentNode.removeChild(row); //Delete the tbody of table
        getBeehives().then((data) => { //Get the new Beehives
            createRows(data, false); //And create the new table
        }).catch((error) => {
            console.log(error);
        });
    });
    //Creation of beehives on click 
    $("#createBeehives").click(function() { 
        addBeehives().then((data) => {
            window.location = "./beehives.php"; //When finish redirect user to the list of beehives
        }).catch((error) => {
            console.log(error);
        });
    });

    //Check if input value change
    $("input[name='search_beehives']").on('input', function(){
        searchtext = document.getElementById('search_beehives').value;
        searchBeehives().then((data) => { //When the value change we request the value of bdd
            var row = document.getElementsByTagName('tbody')[0];
            if(row === undefined) { 
                createRows(data, false); //Important or bug if delete
            } else {
                row.parentNode.removeChild(row);//Delete the table
                createRows(data, false);//Recreate the new table with new data
            }
        }).catch((error) => {
            console.log(error);
        });
    });

    /*A FAIRE ICI*/
    //Check if input value change beehives informations
    $("input[name='search_beehives_data']").on('input', function(){
        searchtext = document.getElementById('search_beehives_data').value;
        searchBeehivesData().then((data) => { //When the value change we request the value of bdd
            var row = document.getElementsByTagName('tbody')[0];
            if(row === undefined) { 
                createRows(data, true); //Important or bug if delete
            } else {
                row.parentNode.removeChild(row);//Delete the table
                createRows(data, true);//Recreate the new table with new data
            }
        }).catch((error) => {
            console.log(error);
        });
    });
});

/*When user click the link "Modifier" he is redirect with parameters of the selected beehives*/
function clickupdatebeehives(id,name,latitude,longitude) {
    window.location = "./form_update.php?id=" + id + "&name=" + name + "&latitude=" + latitude + "&longitude=" + longitude;    
}

/*When user click the link "Supprimer" the modal popup to confirm the delete*/
function deletebeehives(id) {
    get_ID = id;
    $('#modal_confirm_delete').modal('toggle');  
}