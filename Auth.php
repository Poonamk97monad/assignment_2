<?php

include_once 'Connection.php';

class Auth extends Connection
{


    /**
     * User login
     * @param $strUserId
     * @param $strPassword
     * @return void
     */
    public function login($strUserId,$strPassword) {
        echo $strUserId;
        echo $strPassword;
        // To select email and password with mysqli database
        $arrQuery       = "select * from users where email = '$strUserId' and password = '$strPassword'";
        $arrObjResult   = mysqli_query($this->objConnection,$arrQuery);
        if(mysqli_num_rows($arrObjResult) > 0) {
            session_start();
            $_SESSION['userid']   = $strUserId;
            $_SESSION['password'] = $strPassword;
            header("location:home.php");
        }
        else {
            header('Location: index.php?msg=' . urlencode('User_Not_Valid'));
        }
    }

    /**
     * User logout function
     * @return void
     */
    public function logout() {
        session_start();
        unset($_SESSION['userid']);
        header('Location: index.php');
    }

}

