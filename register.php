<?php
//
// Bloggportal 
// Av: Albin Rönnkvist
// Detta är sidan för att registrera användare.
//

$page_title = "Registrera";
include("includes/header.php");

?>
    <!-- Formulär för att registrera ny användare -->
    <h2>Registrera</h2>
    <form class="loginForm" action="#" method="post">
    Användarnamn:<br>
    <input type="text" name="username" required>
    <br>
    Lösenord:<br>
    <input type="password" name="password" required>
    <br>
    För- och efternamn:<br>
    <input type="text" name="fullname" required>
    <br>
    E-postadress:<br>
    <input type="text" name="email" required>
    <br><br>
    <input type="checkbox" name="confirm" required> Jag godkänner att min data lagras.
    <br>
    <input type="submit" name="register" value="Registrera">
    </form>
<?php
//Registrera ny användare

    //Skapa ny instans av klassen Users
    $register = new Users();
    //Registrera
    if(isset($_POST['register']) && isset($_POST['confirm'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if($register->takenUsername($username)){
                echo "<p class='pError'>Användarnamnet är upptaget! Vänligen välj ett annat.</p>";
            }

            if($register->storeUser($username, $password, $fullname, $email)){
                echo "<p class='pSuccess'>Användare skapad!</p>";
            }
            else{
                echo "<p class='pError'>Fel vid lagring!</p>";
            }
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("<p class='pError'>" . "<b>$email</b> är inte en giltig e-postadress!" . "</p>");
        }
    }
?>
<?php
include("includes/sidebarempty.php");
include("includes/footer.php");
?>