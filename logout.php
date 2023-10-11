<?php
// Start or resume the session
session_start();

// Destroy the session
session_destroy();

// Redirect to the login page ord desired page
header("location: user_Login.html");
exit;
?>
