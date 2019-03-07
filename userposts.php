<?php
//
// Bloggportal
// Av: Albin Rönnkvist
// Detta är huvudsidan som kan nås av alla besökare. På denna sida finns möjlighet att läsa inlägg. 
//

$page_title = "Startsida";
include("includes/header.php");

if(isset($_GET['userID'])){
    $id = $_GET['userID'];
}
?>
<?php
  echo "<h2>" . "Senaste inläggen av " . $_GET['userID'] . ":" . "</h2>";
  $specificUser = new CreatePost();
  //Hämta alla inlägg
  $userposts = $specificUser->getPostsByUser();
  //Skriv ut alias,meddelande och datum
  foreach($userposts as $up){
    echo "<div class='postBox'>" . "<h3>" . $up['title'] . "</h3>" . "<p>" . $up['message'] . "</p>" . "<b>" . "<i class='fas fa-pencil-alt'></i> " . "</b>" . $up['username'] . "<br>" . "<b>" . "<i class='far fa-clock'></i> " . "</b>" . $up['date'] . "</div>";
  }
?>
<?php
include("includes/sidebar.php");
include("includes/footer.php");
?>