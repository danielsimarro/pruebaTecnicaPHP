<?php

// We are going to empty the session data
// We start the user's session
session_start();

// Delete session data
$_SESSION['jokes'] = [];

// Redirect to the main window
header("Location: index.php");
exit();
