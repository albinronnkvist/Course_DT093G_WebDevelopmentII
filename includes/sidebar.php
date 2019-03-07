</section><!-- /leftcontent -->
<section id="sidebar">
<!-- Här ligger en lista med alla användare -->
<h2>Användare:</h2>
<?php
$allUsers = new Users();
//Hämta alla användare
$userlist = $allUsers->getUsers();
//Skriv ut användarnamn
echo "<div id='postHolder'>";
foreach($userlist as $u){
  echo "<a class='aButtonUser' href='userposts.php?userID=" . $u['username'] . "'>" . "<i class='fas fa-user'></i> " . $u['username'] . "</a>" . "<hr>";
}
echo "</div>";

?>
<br>
<h2>För utvecklare</h2>
<p>Besök vår <a href="developers.php">sida för utvecklare</a>.</p>
</section>
</div><!-- contentHolder -->