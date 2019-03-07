//
//AJAX-anrop som hämtar inlägg från en resttjänst
//Av: Albin Rönnkvist
//

//JSON-URL: restservice.php?antal=3(Skriver endast ut de tre senaste inläggen)

//Elementet som inläggen ska ligga i
var postContainer = document.getElementById("postHolder");

//Hämta JSON-data
var myRequest = new XMLHttpRequest();

    //Hämta data från servern
    myRequest.open('GET', 'restservice.php?antal=5');

    myRequest.onload = function(){
        //Konvertera textsträngen till json-format
        var postData = JSON.parse(myRequest.responseText);
        console.log(postData);
        printPosts(postData); //Kalla på printPosts()-funktionen och skicka med "postData"-variabeln så att den kan jobba med dess data
    };
    myRequest.send();

//Skriv ut data på HTML-sida
function printPosts(data){

    var printPosts = "";

    //loopa genom data
    for(i = 0; i < data.length; i++){
        //Skapa element av datans värden och lägg de i en sträng("printPosts")
        printPosts += "<div class='postList'>" + "<p>" + data[i].message + "<br><br>" + "<b>Skriven av</b> " + data[i].username + "<br>" + "<b>Publicerad</b> " + data[i].date + "</p>" + "</div>";
    }

    //Konvertera strängen("printPosts") till HTML-element och placera de på en specifik position(beforeend) i DOM
    postContainer.insertAdjacentHTML('beforeend', printPosts);

}