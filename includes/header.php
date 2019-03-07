<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <title><?= $site_title . $divider . $page_title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
    <div id="container">
        <header id="mainheader">
            <a class="headerLogo" href="index.php"></a>
            <?php include("includes/mainmenu.php"); ?>
        </header>

        <div id="contentHolder">
        <section id="leftcontent">