//
//Max antal tecken
//Av: Albin Rönnkvist
//

var textarea = document.querySelector("textarea");

textarea.addEventListener("input", function(){
    var maxlength = this.getAttribute("maxlength");
    var currentLength = this.value.length;

    if( currentLength >= maxlength ){
        document.getElementById("characters").innerHTML = ("Du har nått max antal tecken!");
    }else{
        document.getElementById("characters").innerHTML = (currentLength + " / 999");
    }
});
