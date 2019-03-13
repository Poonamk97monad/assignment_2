<?php

include_once 'User.php';

class User extends Connection
{

    /**
     * To register user and store details in database
     * @param  $strFirstName
     * @param  $strLastName
     * @param  $strEmailId
     * @param  $intPhoneNumber
     * @param  $strAbout
     * @param  $strPassword
     * @return void
     */
    public function register($strFirstName, $strLastName, $strEmailId, $intPhoneNumber, $strAbout, $strPassword) {
        $arrSql = "insert into users(fname,lname,email,phone,about,password) values('$strFirstName ','$strLastName','$strEmailId','$intPhoneNumber','$strAbout','$strPassword')";
        $_SESSION['message'] = "Address saved";
        $arrObjResult = mysqli_query($this->objConnection, $arrSql);
        if (!$arrObjResult) {
            die("Not register");
        } else {

            ?>
            <script type = "text/javascript">
                alert("register successfully");
                window.location = "index.php";
            </script>

            <?php

        }
    }
    /**
     * To getdata form database
     * @param  $query
     * @return array
     */
    public function getData($query)
    {
        $result = $this->objConnection->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    /**
     * To delete user details in database
     * @param  $intId
     * @return void
     */
    public function delete($intId) {

        $arrSql = "delete from users where id = '$intId'";
        $arrObjResult = mysqli_query($this->objConnection, $arrSql);
        if (!$arrObjResult) {
            die("Not delete");
        } else {
            ?>
            <script type = "text/javascript">
                confirm('Are you sure you want to delete?');
                window.location = "home.php";
            </script>
            <?php
        }
    }

    /**
     * To update user and store details in database
     * @param  $intId
     * @param  $strFirstName
     * @param  $strLastName
     * @param  $strEmailId
     * @param  $intPhoneNumber
     * @param  $strAbout
     * @return void
     */
    public function update($intId,$strFirstName, $strLastName, $strEmailId, $intPhoneNumber, $strAbout ) {

        $arrSql = "update users SET fname = '$strFirstName',lname = '$strLastName', email = '$strEmailId',phone = '$intPhoneNumber',about = '$strAbout' where id = '$intId'";
        $arrObjResult = mysqli_query($this->objConnection, $arrSql);
        if (!$arrObjResult) {
            die("record not update");
        } else {
            ?>
            <script type="text/javascript">
                alert("record update succesfully");
                window.location = "home.php";
            </script>
            <?php
        }
    }
}


