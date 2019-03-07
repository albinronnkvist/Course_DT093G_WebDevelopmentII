</section><!-- /leftcontent -->
<section id="sidebar">
<?php
//Om besökaren redan är inloggad
    if(isset($_SESSION["username"])){
        echo "<h2>Inloggad som: " . "<b>" . $_SESSION['username'] . "</b>" . "</h2>";

    $loginFromDB = new Users();

    //logga ut
    if(isset($_GET['logOut'])){
        $loginFromDB->logOutUser($username);
        header("Location: index.php");  
        exit();
    }
    //knapp för att logga ut
    echo "<a class='aButton' href='login.php?logOut'>Logga ut</a>";
    }
?>
</section>
</div><!-- contentHolder -->