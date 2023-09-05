<?php
    function random_strings($length_of_string)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $array = [];
        for ($x = 0; $x <= $_POST['number'] - 1; $x++) {
            $array[] = substr(str_shuffle($str_result), 0, $length_of_string);
        }

        return json_encode($array);
    }

    function encryptData($data) {
        // Store the cipher method
        $ciphering = "AES-128-CTR";
        
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        
        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';
        
        // Store the encryption key
        $encryption_key = "mnbvcxzlkjhgfdsapoiuytrewq";
        
        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($data, $ciphering,
                    $encryption_key, $options, $encryption_iv);
        
        // Display the encrypted string
        return $encryption;
    }

    $content = encryptData(random_strings(7));
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/20BNQVSqbm1aoYh7yqSV.json","wb");
    fwrite($fp, json_encode($content));
    fclose($fp);

    echo 'Generated';
?>