<?php
//
// Bloggportal
// Av: Albin Rönnkvist
// Detta är huvudsidan som kan nås av alla besökare. På denna sida finns möjlighet att läsa inlägg. 
//

$page_title = "Startsida";
include("includes/header.php");
header('Content-Type: text/html; charset=utf-8');
?>
<h2>Senaste inläggen:</h2>
<?php
  $Post = new CreatePost();
  //Hämta alla inlägg
  $postList = $Post->getPosts();
  //Skriv ut alias,meddelande och datum
  foreach($postList as $row){
    echo "<div class='postBox'>" . "<h3>" . $row['title'] . "</h3>" . "<p>" . $row['message'] . "</p>" . "<b>" . "<i class='fas fa-pencil-alt'></i> " . "</b>" . "<a href='userposts.php?userID=" . $row['username'] . "'>" . $row['username'] . "</a>" . "<br>" . "<b>" . "<i class='far fa-clock'></i> " . "</b>" . $row['date'] . "</div>";
  }
?>
<?php
include("includes/sidebar.php");
include("includes/footer.php");
?>