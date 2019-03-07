<?php
//
// Bloggportal
// Av: Albin Rönnkvist
// På denna sida kan användare redigera skapade inlägg.
//

$page_title = "Redigera inlägg";
include("includes/header.php");

if(isset($_GET['updateID'])){
    $id = $_GET['updateID'];
}
else{
    header("location: handlepost.php");
    exit();
}

?>
<?php
//Om besökaren redan är inloggad
    if(isset($_SESSION["username"])) :
?>
<?php

$Post = new CreatePost();

$Updatepost = $Post->getSpecificPost($id);
$title = $Updatepost['title'];
$message = $Updatepost['message'];

if(isset($_POST['update'])){
    
    $title = $_POST['title'];
    $message = $_POST['message'];
  
    if($Post->UpdatePost($title, $message, $id)){
      echo "<p class='pSuccess'>" . "Ditt inlägg är nu uppdaterat!" . "</p>";
    }
    else{
      echo "<p class='pError'>" . "Error - Fel vid uppladning!" . "</p>";
    }
  }

?>
<!-- Redigera inlägg -->
<h2>Redigera inlägg</h2>
<form action="#" method="post">
  Titel:<br>
  <input type="text" name="title" value="<?= $title; ?>">
  <br><br>
  Meddelande:
  <textarea name="message" maxlength="999"><?= $message; ?></textarea>
  <p id="characters"></p>
  <br>
  <input type="submit" name="update" value="Uppdatera">
</form>
<p><a href='handlepost.php'><i class="fas fa-chevron-circle-left"></i> Gå Tillbaka</a></p>
<?php 
endif; 
?>
<?php 
//Om besökaren inte är inloggad
if(!isset($_SESSION["username"])) : 
?>
<h2>Du måste vara inloggad för att redigera inlägg!</h2>
<?php 
endif; 
?>
<?php
include("includes/sidebarempty.php");
include("includes/footer.php");
?>