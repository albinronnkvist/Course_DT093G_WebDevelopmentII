<?php
//
// Bloggportal 
// Av: Albin Rönnkvist
// Detta är sidan där utvecklare kan använda sig av min resttjänt och skapa en widget på sin egna hemsida.
//

$page_title = "Utvecklare";
include("includes/header.php");
?>
<h2>För utvecklare:</h2>
<br>
<h3 class="h3black">Resttjänst</h3>
<p>Använd vår resttjänst till att skapa en widget eller liknande som läser ut våra inlägg på din webbplats!
Länk till resttjänst: <a class="aLink" href="restservice.php?antal=5" target="_blank">restservice.php?antal=5</a></p>
<p>
    Ändra "?antal=" till antal inlägg du vill ska skrivas ut. 
    <br>Exempel: <b>"restservice.php?antal=2"</b> skriver ut 2 inlägg. 
    Anges inget antal, dvs om du tar bort "?antal=2" från URL:en så skrivs alla inlägg ut.
</p>
<br>
<h3 class="h3black">Exempel på en widget:</h3>
<div id="postHolder">
<div id="postDescription"><h4>Vegobeautys Senaste Inlägg:</h4></div>
</div>
<p>
    Här används ett AJAX-anrop för att läsa ut inläggen från resttjänsten. 
    Ladda ned Javascript-filen nedan och gör specifika ändringar för utläsning på din webbplats.
</p>
<a class="aLink" href="js/consume.js" download>consume.js <i class="fab fa-js-square"></i></a>
<script src="js/consume.js"></script>
<br>
<?php
//I includen "sidebar" ligger koden för att logga in
include("includes/sidebarempty.php");
include("includes/footer.php");
?>