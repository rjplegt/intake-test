<?php

//make sure to start the session if not done already
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//check if a user has been logged in, if not redirect to login page
if (!$_SESSION['logged_in']) {
    header("Location: login.php");
}