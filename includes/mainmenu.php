<nav id="mainmenu">
    <ul>
        <li><a href="index.php">Hem</a></li>
        <li><a href="createpost.php">Skapa inlägg</a></li>
        <li><a href="handlepost.php">Hantera inlägg</a></li>
        <li>|</li>
        <?php 
        //Om besökaren inte är inloggad
        if(!isset($_SESSION["username"])) : 
        ?>
        <li><a href="login.php">Logga in <i class="fas fa-sign-in-alt"></i></a></li>
        <li><a href="register.php">Registrera <i class="fas fa-user-plus"></i></a></li>
        <?php 
        endif; 
        ?>
        <?php
        //Om besökaren redan är inloggad
            if(isset($_SESSION["username"])) :
                $loginFromDB = new Users();

            //logga ut
            if(isset($_GET['logOut'])){
                $loginFromDB->logOutUser($username);
                header("Location: index.php");  
                exit();
            }
        ?>
        <li><a href="?logOut">Logga ut <i class="fas fa-sign-out-alt"></i></a></li>
        <?php 
        endif; 
        ?>
    </ul>
</nav>
<?php 
//Om besökaren inte är inloggad
if(!isset($_SESSION["username"])) : 
?>
<!-- Logga in/registrera - mobilt -->
<a class="smallmenuLogin" href="register.php" title="Registrera">
    <i class="fas fa-user-plus"></i>
</a>
<a class="smallmenuLogin" href="login.php" title="Logga in">
    <i class="fas fa-sign-in-alt"></i>
</a>
<?php 
endif; 
?>
<?php
//Om besökaren redan är inloggad
    if(isset($_SESSION["username"])) :
        $loginFromDB = new Users();

    //logga ut
    if(isset($_GET['logOut'])){
        $loginFromDB->logOutUser($username);
        header("Location: index.php");  
        exit();
    }
?>
<a class="smallmenuLogin" href="?logOut"><i class="fas fa-sign-out-alt"></i></a>
<?php 
    endif; 
?>
<!-- Mobila menyn - .smallmenu -->
<div class="smallmenu" id="myTopnav">
    <a href="index.php">Hem</a>
    <a href="createpost.php">Skapa inlägg</a>
    <a href="handlepost.php">Hantera inlägg</a>
<?php 
//Om besökaren inte är inloggad
if(!isset($_SESSION["username"])) : 
?>
    <a href="login.php">Logga in</a>
    <a href="register.php">Registrera</a>
<?php 
endif; 
?>
<?php
//Om besökaren redan är inloggad
    if(isset($_SESSION["username"])) :
        $loginFromDB = new Users();

    //logga ut
    if(isset($_GET['logOut'])){
        $loginFromDB->logOutUser($username);
        header("Location: index.php");  
        exit();
    }
?>
    <a href="?logOut">Logga ut</a>
<?php 
    endif; 
?>
    <a href="javascript:void(0);" class="icon" onclick="foldMenu()">
        <span class="line1"></span>
        <span class="line2"></span>
        <span class="line3"></span>
    </a>
</div>

<!-- logga i lilla menyn -->
<a class="logo2" href="index.php"></a>