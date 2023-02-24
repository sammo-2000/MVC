<?php
include_once 'dbh.php';
class Login extends Dbh
{
    protected function getUserInfoByUsername($username) {
        $sql = 'SELECT `user_id`, `user_username`, `user_password` FROM `user` WHERE `user_username` = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        return $result;
    }
}