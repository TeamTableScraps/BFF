<?php

function encryptString($string)
{
    if (trim($string) != "") {
        $iv = mcrypt_create_iv(
            mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),
            MCRYPT_DEV_URANDOM
        );
        $string = base64_encode(
            $iv .
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_256,
                hash('sha256', AESKEY, true),
                $string,
                MCRYPT_MODE_CBC,
                $iv
            )
        );
    }
    return $string;
}

function decryptString($string)
{
    if (trim($string) != "") {
        $data = base64_decode($string);
        if (strlen($data) >= 16) {
            $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
            $string = rtrim(
                mcrypt_decrypt(
                    MCRYPT_RIJNDAEL_256,
                    hash('sha256', AESKEY, true),
                    substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),
                    MCRYPT_MODE_CBC,
                    $iv
                ),
                "\0"
            );
        }
    }
    return $string;
}

?>