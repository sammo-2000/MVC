<?php
// Start the session
session_start();
// Set title
$title = 'Home';
// Load the header
include_once 'inc/head.php';
?>
<h1>Home page</h1>
<?php
    if (isset($_SESSION['logged_on'])) {
        echo '<p>Welcome back ' . $_SESSION['user_username'] . '</p>';
    }
?>
<?php
// Load the footer
include_once 'inc/foot.php';
?>