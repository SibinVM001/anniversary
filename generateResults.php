<?php
    $winnersStr = file_get_contents('winners.json');
    $winnersJson = json_decode($winnersStr, true);

    foreach ($winnersJson as $email => $code) {
        if ($code != '-') {
            $winners[$email] = $code;
        }
    }

    echo json_encode($winners);
?>