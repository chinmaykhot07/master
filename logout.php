<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: responsive.php?page=home"); // Redirecting To Home Page
}
?>