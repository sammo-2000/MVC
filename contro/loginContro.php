<?php
include_once 'model/login.php';
class LoginContro extends Login
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = strtolower($username);
        $this->password = $password;
    }

    public function login()
    {
        // Get user login information
        $result = $this->getUserInfoByUsername($this->username);

        // Check all field are filled
        if (empty($this->username) || empty($this->password)) {
            $_SESSION['error'] = 'Please make sure all field are filled';
            header('location: ../login.php');
            exit();
        }

        // Verify that user exist
        if ($result['user_username'] != $this->username) {
            $_SESSION['error'] = 'User does not exist';
            header('location: ../login.php');
            exit();
        }

        // Verify password matches, in this case password is not hashed
        if ($this->password != $result['user_password']) {
            $_SESSION['error'] = 'Password not matching';
            header('location: ../login.php');
            exit();
        }

        // Add sessions veriable / UserId is stored to track the user around the website
        session_regenerate_id();
        $_SESSION['logged_on'] = true;
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['user_username'] = $result['user_username'];
    }
}