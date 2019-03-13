<?php

include_once 'Connection.php';

class Validation extends Connection
{
    /**
     * To check empty fileds
     * @param  $data
     * @param  $filels
     * @return String
     */
    public function check_empty($data, $fields) {
        $msg = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "$value field empty <br />";
            }
        }
        return $msg;
    }

    /**
     * To check valid phone number
     * @param  $intPhone
     * @return Boolean
     */
    public function is_phone_valid($intPhone) {
        //if (is_numeric($intPhone)) {
        if (preg_match("/^[0-9]+$/", $intPhone)) {
            return true;
        }
        return false;
    }

    /**
     * To check both password are same
     * @param  $strPassword
     * @param  $strRePassword
     * @return Boolean
     */
    public function is_password_correct($strPassword,$strRePassword) {
        //if (is_numeric($age)) {
        if ($strPassword === $strRePassword) {
            return true;
        }
        return false;
    }

    /**
     * To check valid emailId
     * @param  $strEmail
     * @return Boolean
     */
    public function is_email_valid($strEmail) {
        //if (preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
        if (filter_var($strEmail, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

}

