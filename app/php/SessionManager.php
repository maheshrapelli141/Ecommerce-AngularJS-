<?php
/**
 * Created by PhpStorm.
 * User: mahesh
 * Date: 2/1/19
 * Time: 2:40 PM
 */
class SessionManager
{
    public function __construct()
    {
        $this->startSession();
    }

    public function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function isSessionOn(){
        if(isset($_SESSION['email']))
            return true;
        else
            return false;
    }

    public function createSession($userID, $username, $email){
        $this->startSession();
        $_SESSION['userID'] = $userID;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
    }

    public function getUserID(){
        $this->startSession();
        return $_SESSION['userID'];
    }

    public function getUsername(){
        $this->startSession();
        return $_SESSION['username'];
    }

    public function getEmail(){
        $this->startSession();
        return $_SESSION['email'];
    }

    public function destroySession(){
        $this->startSession();
            session_unset();
            session_destroy();
    }
}