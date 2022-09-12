<?php
class method
{

    public static function checkEmptyValue($arr) // check empty value?
    {
        foreach ($arr as $value) {
            if (empty($value)) {
                return true;
            }
        }
        return false;
    }

    public static function isNumeric($data) // check số thập phân?
    {
        if (is_numeric($data) && $data > 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function validateName($data) // check tên?
    {
        if (preg_match("/^[a-zA-Z0-9_]{1,50}$/", $data)) {
            return false;
        } else {
            return true;
        }
    }

    public static function validatePassUser($data) // check mật khẩu 1?
    {
        if(preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/",$data))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    public static function validatePassword($data) // check mật khẩu 2?
    {
        if (preg_match("/^[a-zA-Z0-9_]{6,50}$/", $data)) {
            return false;
        } else {
            return true;
        }
    }
    public static function validateEmail($data) // check email?
    {
        if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }
    public static function validatePhone($data) // check số điện thoại?
    {
        if (preg_match("/^[0-9]{10,11}$/", $data)) {
            return false;
        } else {
            return true;
        }
    }


  


}
