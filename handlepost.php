<?php
//
// Bloggportal
// Av: Albin Rönnkvist
// Detta är sidan där användare kan hantera sina egna inlägg. 
//

$page_title = "Hantera inlägg";
include("includes/header.php");

?>
<?php 
//Om besökaren inte är inloggad
if(!isset($_SESSION["username"])) : 
?>
<h2>Du måste vara inloggad för att hantera inlägg!</h2>
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
//Om besökaren redan är inloggad
    if(isset($_SESSION["username"])) :
?>
<h2>Hantera dina inlägg</h2>
<?php
  $Post = new CreatePost();

  //Radera inlägg
  if(isset($_GET['deleteID'])){
    $id = $_GET['deleteID'];
    if($Post->DeletePost($id)){
      echo "<p class='pSuccess'>" . "Inlägget raderades!" . "</p>";
    }
    else{
      echo "<p class='pError'>" . "Fel vid radering!" . "</p>";
    }
  }
?>
<?php
  //Hämta alla inlägg
  $postList = $Post->getSpecificPosts();
  //Skriv ut alias,meddelande, datum och en knapp för att radera
  foreach($postList as $row){
    echo "<div class='postBox'>" . "<h3>" . $row['title'] . "</h3>" . "<p>" . $row['message'] . "</p>" . "<b>" . "<i class='fas fa-pencil-alt'></i> " . "</b>" . $row['username'] . "<br>" . "<b>" . "<i class='far fa-clock'></i> " . "</b>" . $row['date'] . "<br><br>"
    . "<a class='aButton' href='update.php?updateID=" . $row['postid'] . "'>Redigera <i class='fas fa-edit'></i></a>" . "<a class='aDelete' href='handlepost.php?deleteID=" . $row['postid'] . "'>Radera <i class='fas fa-trash'></i></a>" . "<br><br>" . "</div>";
  }
?>
<?php 
endif; 
?>
<?php
include("includes/sidebarempty.php");
include("includes/footer.php");
?>