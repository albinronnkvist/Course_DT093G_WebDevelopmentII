<?php
//
// Bloggportal 
// Av: Albin Rönnkvist
// Detta är sidan för att logga in.
//

$page_title = "Logga in";
include("includes/header.php");

?>
<?php
//Om besökaren redan är inloggad
    if(isset($_SESSION["username"])){
        echo "<h2>Du är inloggad!</h2>";
    }
?>
<?php 
//Om besökaren inte är inloggad
if(!isset($_SESSION["username"])) : 
?>
    <!-- Formulär för att logga in -->
    <h2>Logga in</h2>
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