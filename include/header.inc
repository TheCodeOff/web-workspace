<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo "$MySiteName - $title"; ?>
    </title>

    <link rel="shortcut icon" href="img/favicon.ico"/>
    <link rel="stylesheet" href="style/common.css"/>
    <link rel="stylesheet" href="style/content.css"/>
    <link rel="stylesheet" href="style/header.css"/>
    <link rel="stylesheet" href="style/sidebar.css"/>
</head>
<body>
<h2 class='header'>
    <span></span><?php echo $title ?>
</h2>
<a href="/forum/">
    <img class="header_subtext" id="header_logo" src="style/png/logo.png" alt="logo">
</a>
<!-- NOT WORKING
<span class="header_subtext" id="header_user_name">
        <?php echo getenv('username'); ?>
</span>
-->
<span class="header_subtext" id="header_user_ip">
 <?php
 if (getenv('REMOTE_ADDR') == '::1') {
     echo 'localhost';
 } else {
     echo getenv('REMOTE_ADDR');
 }
 ?>
</span>