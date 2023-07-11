<?php

session_unset();
session_destroy();
header('location:index.php');


/*
session_start();

unset($_SESSION['visaid']);
unset($_SESSION['permission']);


session_destroy();


header("Location: index.php");
*/

?>
