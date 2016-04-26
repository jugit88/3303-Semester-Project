<?php
/**
 * @file auth.php
 * @brief Session implementation
 * @authors Drew Meyers Jeremy Udis James Draper
 * @details This implementation takes advantage of cookies. 
 * 
 * 
 *
 *
 * 
 * 
 * 
 */
session_start();
if(!isset($_SESSION["username"])){
header("Location: signin.php");
exit(); }
?>
