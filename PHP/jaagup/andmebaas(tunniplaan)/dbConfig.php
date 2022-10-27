<?php
//$server = "localhost";
//$database = "tunniplaan";
//$user = "tunniplaan";
//$password = "W25]DLxRV5rcKFlK";
$server = "d113905.mysql.zonevs.eu";
$database = "d113905_tunniplaan";
$user = "d113905_tunnipla";
$password = "69huperboloid69";

//if (isset($server) && (isset($user)) && (isset($password)) && (isset($database))) {
    $yhendus=new mysqli($server, $user, $password, $database);
    if($yhendus->connect_errno) {
        echo "Failed to connect to database.";
        exit();
    }
//}

$yhendus->set_charset("utf8");