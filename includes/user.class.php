<?php

class User{
    public $userID;
    public $fname;
    public $lname;
    public $email;
    public $password;
    public $valid;
    public $isVendor;
    public $isSponsor;

    function User($email, $password){
        $this->email = $email;
        $this->password = $password;

        if ($this->authenticate()) {
            $this->valid = true;
        } else {
            $this->valid = false;
        }
        $this->isVendor = false;
        $this->isSponsor = false;
    }

    function authenticate(){
        $return = false;

        global $aesKey;
        global $MySQLi;

        $password = addslashes($this->password);

        $checkQuery = "
            SELECT
                user_ID,
                AES_DECRYPT(first_name, '$aesKey') as first_name, 
                AES_DECRYPT(last_name, '$aesKey') as last_name
            FROM users
            WHERE AES_DECRYPT(email, '$aesKey') = '$this->email'
            AND AES_DECRYPT(password, '$aesKey') = '" . decryptString($password) . "'
            LIMIT 1
        ";
        $check = $MySQLi->query($checkQuery);
        if($check != false){
            if ($check->num_rows > 0) {
                while($r = $check->fetch_array()){
                    $this->userID = $r["user_ID"];
                    $this->fname = $r["first_name"];
                    $this->lname = $r["last_name"];
                }
                $return = true;
            } else {
                $return = false;
            }
        }else{
            die("Query error");
        }

        return $return;
    }

    function username(){
        return $this->fname." ".$this->lname;
    }
}