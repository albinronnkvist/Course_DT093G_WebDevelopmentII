<?php
//
//Bloggportal
//Av: Albin Rönnkvist
//Detta är sidan för att skriva ut alla inlägg i JSON-format
//
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

include("includes/config.php");
?>
<?php
$restPosts = new RestPost();

//Skriv ut inläggen
echo $restPosts->getWidgetPosts();

?>