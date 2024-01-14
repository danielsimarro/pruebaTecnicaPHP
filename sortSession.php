<?php
// We start the user's session
session_start();

// Sort session variable
sort($_SESSION['jokes']);

// Redirect user back to home page
header("Location: index.php");
exit();
?>
