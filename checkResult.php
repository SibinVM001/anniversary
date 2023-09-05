<?php
    try {
        // $email = $_POST['email'];
        $probability = 2;

        function decryptData($data) {
            // Store the cipher method
            $ciphering = "AES-128-CTR";

            // Use OpenSSl Encryption method
            $iv_length = openssl_cipher_iv_length($ciphering);
            $options = 0;

            // Non-NULL Initialization Vector for decryption
            $decryption_iv = '1234567891011121';
            
            // Store the decryption key
            $decryption_key = "mnbvcxzlkjhgfdsapoiuytrewq";
            
            // Use openssl_decrypt() function to decrypt the data
            $decryption = openssl_decrypt ($data, $ciphering,
                    $decryption_key, $options, $decryption_iv);
            
            // Display the decrypted string
            return $decryption;
        }

        $str = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/anniversary/20BNQVSqbm1aoYh7yqSV.json");
        $json = json_decode(decryptData($str), true);

        $winnersStr = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/anniversary/winners.json");
        $winnersJson = json_decode($winnersStr, true);

        $remoteAddresses = [];
        $devices = [];
        $couponCodes = [];

        foreach ($winnersJson as $key => $value) {
            $remoteAddresses[] = $value['remote-address'];
            $devices[] = $value['device'];
            $couponCodes[] = $value['coupon-code'];
        }

        function setCookies() {
            list($usec, $sec) = explode(" ", microtime()); // Micro time!
            $expire = time()+60*60*24*30; // expiration after 30 day
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomNum = md5("".$sec.".".$usec."").substr(str_shuffle($str_result), 0, 5);
            setcookie("visited", "".$randomNum."", $expire, "/", "", "0");

            return $randomNum;
        }

        function changeCookies($arrStr, $oldkey) {
            $content = str_replace('"'.$oldkey.'":', '"'.setCookies().'":', $arrStr);
            $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/anniversary/sample.txt", 'w');
            fwrite($fp, $content);
            fclose($fp);  
        }
        
        if (isset($_COOKIE['visited'])) {
            if (in_array($_COOKIE['visited'], array_keys($winnersJson))) {
                echo $winnersJson[$_COOKIE['visited']]['coupon-code'];

            } else {
                foreach ($winnersJson as $key => $value) {
                    if (in_array($_SERVER['REMOTE_ADDR'], $remoteAddresses) || in_array($_SERVER['HTTP_USER_AGENT'], $devices)) {
                        if ($value['remote-address'] == $_SERVER['REMOTE_ADDR']) {
                            changeCookies($winnersStr, $key);
                            if ($value['coupon-code'] != '-') {
                                echo $value['coupon-code'];
                            }

                            break;
                        } 
                        if ($value['device'] == $_SERVER['HTTP_USER_AGENT']) {
                            changeCookies($winnersStr, $key);
                            if ($value['coupon-code'] != '-') {
                                echo $value['coupon-code'];
                            }

                            break;
                        }
                    } else {
                        $rand = rand(0, $probability);
                        $_COOKIE['visited'] = setCookies();
        
                        if ($rand == $probability) {
                            foreach ($json as $key => $number) {
                                if (!in_array($number, $couponCodes)) {
                                    $winnersJson[$_COOKIE['visited']] = [
                                        "remote-address" => $_SERVER['REMOTE_ADDR'],
                                        "device" => $_SERVER['HTTP_USER_AGENT'],
                                        // "email" => $email,
                                        "coupon-code" => $number
                                    ];
        
                                    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/anniversary/winners.json","wb");
                                    fwrite($fp, json_encode($winnersJson));
                                    fclose($fp);
        
                                    echo $number;
        
                                    break;
                                }
                            }
                        } else {
                            $winnersJson[$_COOKIE['visited']] = [
                                "remote-address" => $_SERVER['REMOTE_ADDR'],
                                "device" => $_SERVER['HTTP_USER_AGENT'],
                                // "email" => $email,
                                "coupon-code" => '-'
                            ];
        
                            $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/anniversary/winners.json","wb");
                            fwrite($fp, json_encode($winnersJson));
                            fclose($fp);
        
                            echo "-";
                        }
                        break;
                    }
                }
            }
        } else {
            foreach ($winnersJson as $key => $value) {
                if (in_array($_SERVER['REMOTE_ADDR'], $remoteAddresses) || in_array($_SERVER['HTTP_USER_AGENT'], $devices)) {
                    if ($value['remote-address'] == $_SERVER['REMOTE_ADDR']) {
                        changeCookies($winnersStr, $key);
                        echo $value['coupon-code'];

                        break;
                    } 
                    if ($value['device'] == $_SERVER['HTTP_USER_AGENT']) {
                        changeCookies($winnersStr, $key);
                        echo $value['coupon-code'];

                        break;
                    }
                } else {
                    $rand = rand(0, $probability);
                    $_COOKIE['visited'] = setCookies();

                    if ($rand == $probability) {
                        foreach ($json as $key => $number) {
                            if (!in_array($number, $couponCodes)) {
                                $winnersJson[$_COOKIE['visited']] = [
                                    "remote-address" => $_SERVER['REMOTE_ADDR'],
                                    "device" => $_SERVER['HTTP_USER_AGENT'],
                                    // "email" => $email,
                                    "coupon-code" => $number
                                ];

                                $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/anniversary/winners.json","wb");
                                fwrite($fp, json_encode($winnersJson));
                                fclose($fp);

                                echo $number;

                                break;
                            }
                        }
                    } else {
                        $winnersJson[$_COOKIE['visited']] = [
                            "remote-address" => $_SERVER['REMOTE_ADDR'],
                            "device" => $_SERVER['HTTP_USER_AGENT'],
                            // "email" => $email,
                            "coupon-code" => '-'
                        ];

                        $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/anniversary/winners.json","wb");
                        fwrite($fp, json_encode($winnersJson));
                        fclose($fp);

                        echo "-";
                    }
                    break;
                }
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }







    
    // } 
    // else {
    //     foreach ($winnersJson as $key => $value) {
    //         if ($value['remote-address'] == $_SERVER['REMOTE_ADDR']) {
    //             changeCookies($winnersStr, $key);
    //             echo "same device";

    //             break;
    //         } 
    //         else if ($value['device'] == $_SERVER['HTTP_USER_AGENT']) {
    //             changeCookies($winnersStr, $key);
    //             echo "same device";

    //             break;
    //         } 
    //         else {
    //             $rand = rand(0, 5);

    //             if ($rand == 5) {
    //                 foreach ($json as $key => $number) {
    //                     if (!in_array($number, array_keys($winnersJson))) {
    //                         $winnersJson[$_COOKIE['visited']] = [
    //                             "remote-address" => $_SERVER['REMOTE_ADDR'],
    //                             "device" => $_SERVER['HTTP_USER_AGENT'],
    //                             "email" => $email,
    //                             "coupon-code" => $number
    //                         ];

    //                         $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/winners.json","wb");
    //                         fwrite($fp, json_encode($winnersJson));
    //                         fclose($fp);

    //                         echo "<div class='coupon-code'>" . $number . "</div>";

    //                         break;
    //                     }
    //                 }
    //             } else {
    //                 $winnersJson[$_COOKIE['visited']] = [
    //                     "remote-address" => $_SERVER['REMOTE_ADDR'],
    //                     "device" => $_SERVER['HTTP_USER_AGENT'],
    //                     "email" => $email,
    //                     "coupon-code" => '-'
    //                 ];

    //                 $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/winners.json","wb");
    //                 fwrite($fp, json_encode($winnersJson));
    //                 fclose($fp);

    //                 echo "<div class='coupon-code'>Sorry! Better Luck Next Time</div>";
    //             }
    //             break;
    //         }
    //         break;
    //     }
    // }

    // if(isset($_COOKIE['visited'])) {
    //     if (in_array($_COOKIE['visited'], array_keys($winnersJson))) {
    //         if ($winnersJson[$_COOKIE['visited']] != '-') {
    //             echo "<div class='coupon-code'>" . str_replace('Delivered-', '', $winnersJson[$_COOKIE['visited']]['coupon-code']) . "</div>";
    //         } else {
    //             echo "<div class='coupon-code'>You have already scrached</div>";
    //         }
    //     } else {
    //         $rand = rand(0, 5);

    //         if ($rand == 5) {
    //             foreach ($json as $key => $number) {
    //                 if (!in_array($number, array_keys($winnersJson))) {
    //                     $winnersJson[$_COOKIE['visited']] = [
    //                         "remote-address" => $_SERVER['REMOTE_ADDR'],
    //                         "device" => $_SERVER['HTTP_USER_AGENT'],
    //                         "email" => $email,
    //                         "coupon-code" => $number
    //                     ];

    //                     $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/winners.json","wb");
    //                     fwrite($fp, json_encode($winnersJson));
    //                     fclose($fp);

    //                     echo "<div class='coupon-code'>" . $number . "</div>";

    //                     break;
    //                 }
    //             }
    //         } else {
    //             $winnersJson[$_COOKIE['visited']] = [
    //                 "remote-address" => $_SERVER['REMOTE_ADDR'],
    //                 "device" => $_SERVER['HTTP_USER_AGENT'],
    //                 "email" => $email,
    //                 "coupon-code" => '-'
    //             ];

    //             $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/winners.json","wb");
    //             fwrite($fp, json_encode($winnersJson));
    //             fclose($fp);

    //             echo "<div class='coupon-code'>Sorry! Better Luck Next Time</div>";
    //         } 
    //     }   
    // } else {
    //     list($usec, $sec) = explode(" ", microtime()); // Micro time!
    //     $expire = time()+60*60*24*30; // expiration after 30 day
    //     setcookie("visited", "".md5("".$sec.".".$usec."")."", $expire, "/", "", "0"); 


    // }





    // old code



    // if (in_array($_POST['email'], array_keys($winnersJson))) {
    //     if ($winnersJson[$_POST['email']] != '-') {
    //         echo "<div class='coupon-code'>" . str_replace('Delivered-', '', $winnersJson[$_POST['email']]) . "</div>";
    //     } else {
    //         echo "<div class='coupon-code'>You have already scrached</div>";
    //     }
    // } else {
    //     $rand = rand(0, 5);

    //     if ($rand == 5) {
    //         foreach ($json as $key => $number) {
    //             if (!in_array($number, array_values($winnersJson))) {
    //                 $content = str_replace('}', ',"'.$_POST['email'].'": "'.$number.'"}', $winnersStr);
    //                 $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/winners.json","wb");
    //                 fwrite($fp,$content);
    //                 fclose($fp);

    //                 echo "<div class='coupon-code'>" . $number . "</div>";

    //                 break;
    //             }
    //         }
    //     } else {
    //         $content = str_replace('}', ',"'.$_POST['email'].'": "-"}', $winnersStr);
    //         $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/winners.json","wb");
    //         fwrite($fp,$content);
    //         fclose($fp);

    //         echo "<div class='coupon-code'>Sorry! Better Luck Next Time</div>";
    //     }
    // }

    // foreach ($json as $key => $number) {
        // $content = $winnersStr . '{"s@gmail.com": "'.$number.'"}';
        // $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/winners.json","wb");
        // fwrite($fp,$content);
        // fclose($fp);

        // foreach (json_decode($winners) as $winner) {
        //     echo $winner;
        // }
        // fwrite($fp,$content);
        // fclose($fp);

        // echo $number;
        // break;
    // }
    // if (in_array($_POST['number'], $json)) {
    //     echo $_POST['number'];
    // } else {
    //     echo 'sorry';
    // }
?>