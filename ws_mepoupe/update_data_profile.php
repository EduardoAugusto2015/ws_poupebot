<?php
    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $newpass = $_POST['newpass'];

    $date_update = date("Y-m-d H:i:s");

    $response = array();

    $query = "update users set name='$name', age='$age', email='$email', date_update='$date_update' where id=$id;";
    mysql_query($query,$conexao);

    $search = mysql_query("SELECT name, age, email FROM users where id = '$id'");
    $list = mysql_fetch_array($search);

    $name = $list['name'];
    $age = $list['age'];
    $email = $list['email'];
    $pass = $list['pass'];

    $resultCode = "OK";
    $response = array(
        'resultCode' => $resultCode);

    echo json_encode($response);

?>