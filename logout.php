<?php
/**
* @file logout.php
* @brief This is a logout method in order to end the session.
* @details destroys current session and redirection to the home page
* 
*/
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: signin.php"); // Redirecting To Home Page
}
?>
