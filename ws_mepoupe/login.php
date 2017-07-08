<?php

    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");

    mysql_set_charset('utf8');

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $response = array();

    $sql = mysql_query("select * from users where email = '$email' and pass = '$pass'") or die (mysql_error());
    $row = mysql_num_rows($sql);

    if ($row > 0) {

        $query = mysql_query("SELECT id, name FROM users where email = '$email'");
        $list = mysql_fetch_array($query);

        $id = $list["id"];
        $name = $list["name"];
        
        $login = "OK";
        $response = array(
            'resultCode' => $login,
            'id' => $id,
            'name' => $name
        );

        echo json_encode($response);

    } else {

        $login = "ERROR";
        $response = array('resultCode' => $login);
        echo json_encode($response);
    }

?>