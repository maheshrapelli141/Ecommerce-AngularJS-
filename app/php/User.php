<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 31/12/18
 * Time: 12:18 PM
 */
require_once('DB.php');

class User extends DB
{
    public function addUser($newUsername, $newEmail,$newPassword){
        $sql = "INSERT INTO users(username,email,password) VALUES('$newUsername','$newEmail','$newPassword')";
        return $this->executeQuery($sql);
    }

    public function getUser($userID){
        $sql = "SELECT * FROM users WHERE user_id=$userID";
        $result = $this->selectQuery($sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    public function getUserByEmail($email){
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $this->selectQuery($sql);
        $row = mysqli_fetch_array($result);
        return $row;
    }

    public function removeUser($userID){
        $sql = "DELETE FROM users WHERE user_id=$userID";
        return $this->executeQuery($sql);
    }

    public function checkUser($userID){
        if(mysqli_num_rows($this->getUser($userID))==1)
            return true;
        else
            return false;
    }

    public function loginCheck($email,$password){
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password';";
        if(mysqli_num_rows(mysqli_query($this->getConnect(),$sql))==1){
            return true;
        }
        else
            return false;
    }
}