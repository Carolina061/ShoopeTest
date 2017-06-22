<?php

/* database.php
  database function
 */
global $con;
$con = new PDO('mysql:host=localhost;dbname=shopee;charset=utf8mb4', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
if (!$con) {
    die("database connect problem");
}

function execQ($strQ) {
    global $con;

    $res = $con->query($strQ);
    return $res->fetchAll(PDO::FETCH_ASSOC);
}

function getUser($username,$password) {
    $strQ = "select * from user where username = '" . $username . "' and password = '".$password."'";
    $resUsr = execQ($strQ);
    if (count($resUsr) > 0) {
        return true;
    } else {
        return false;
    }
}

function addSeller($username,$password,$email,$ktp_number,$photo_of_user,$photo_of_ktp) {
    $strQins = "insert into user (username, password,email) values(" . $username . ", '" . $password . "' '".$email."')";
    $res = execQ($strQins);
    $strQsel = "select user_id from user where username = " . $username . " and password = '" . $password . "'";
    $res2 = execQ($strQsel);
    $user_id = $res2[0][user_id];
    $strQins2 = "insert into detail_user (user_id,ktp_number, photo_of_user,photo_of_ktp) values('".$user_id."', '" . $ktp_number . "', '" . $photo_of_user . "' '".$photo_of_ktp."')";
    $res3 = execQ($strQins2);
    return true;
}

?>
