<?php
//
// Bloggportal
// Av: Albin Rönnkvist
// På denna sida kan användare skapa inlägg.
//

$page_title = "Skapa inlägg";
include("includes/header.php");

?>
<?php
//Om besökaren redan är inloggad
    if(isset($_SESSION["username"])) :
?>
<!-- Skapa nytt inlägg -->
<h2>Skapa inlägg</h2>
<form action="#" method="post">
  Titel:<br>
  <input type="text" name="title">
  <br><br>
  Meddelande:
  <textarea maxlength="999" name="msg"></textarea>
  <p id="characters"></p>
  <br>
  <input type="submit" name="submit" value="Publicera">
</form>
<?php
$Post = new CreatePost();

if(isset($_POST['submit'])){
    
  $username = $_SESSION['username'];
  $title = $_POST['title'];
  $message = $_POST['msg'];

  if($Post->addPost($username, $title, $message)){
    echo "<p class='pSuccess'>" . "Ditt inlägg är nu upladdat!" . "</p>";
  }
  else{
    echo "<p class='pError'>" . "Error - Fel vid uppladning!" . "</p>";
  }
}
?>
<?php 
endif; 
?>
<?php 
//Om besökaren inte är inloggad
if(!isset($_SESSION["username"])) : 
?>
<h2>Du måste vara inloggad för att skapa inlägg!</h2>
    <!-- Formulär för att logga in -->
    <form class="loginForm" action="#" method="post">
    Användarnamn:<br>
    <input type="text" name="username">
    <br>
    Lösenord:<br>
    <input type="password" name="password">
    <br>
    <input type="submit" name="logIn" value="Logga in">
    </form>
    <p>Har du inget konto? <a href="register.php">Registrera dig!</a></p>
<?php
//Logga in med användare från databas
    $loginFromDB = new Users();

    if(isset($_POST['logIn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        if($loginFromDB->loginUser($username, $password)){
            header("Location: login.php");  
            exit();
        }
        else{
            echo "<p class='pError'>" . "Fel lösenord eller användarnamn!";
        }
    }
?>
<?php 
endif; 
?>
<?php
include("includes/sidebarempty.php");
include("includes/footer.php");
?>