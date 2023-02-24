<?php
// Start the session
session_start();
// Only none logged on user can view this page
if (isset($_SESSION['logged_on']))
{
    header('location: index.php');
}
// Check if user reached by POST method
if (isset($_POST['login'])) {
    // Grab data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate Class
    include_once 'model/login.php';
    include_once 'contro/loginContro.php';
    $login = new LoginContro($username, $password);

    // Running the code
    $login->login();

    // Redirect if successful
    header('location: index.php');
}
// Set title
$title = 'Login';
// Load the header
include_once 'inc/head.php';
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" name="username">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
     <input type="submit" value="login" name="login"> 
    <?php if(isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    } ?>
</form>
<?php
// Load the footer
include_once 'inc/foot.php';
?>