<?php
    $filecontent = file_get_contents('winners.json');
    $winnersJson = json_decode($filecontent, true);

    if (in_array($_POST['email'], array_keys($winnersJson))) {
        $pos = strpos($filecontent, $winnersJson[$_POST['email']]);
        $data = 'Delivered-';
        $filecontent = substr($filecontent, 0, $pos)."$data".substr($filecontent, $pos);
        file_put_contents("winners.json", $filecontent);
        echo 'done';
    }
?>