<?php
    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    $id = $_POST['id'];

    $response = array();

    $search = mysql_query("SELECT name, age, email FROM users where id = '$id'");

    $list = mysql_fetch_array($search);

    $name = $list['name'];
    $age = $list['age'];
    $email = $list['email'];

    $code = "OK";
    $response = array(
        'resultCode' => $code,
        'name' => $name,
        'age' => $age,
        'email' => $email);

    echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>