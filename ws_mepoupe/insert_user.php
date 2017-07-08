<?php
    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $date = date("Y-m-d H:i:s");

    $response = array();

    $search = mysql_query("SELECT * FROM users WHERE email = '$email'");

    if (mysql_num_rows($search) > 0) {

        $result = "NO";
        $response = array('resultCode' => $result);

        echo json_encode($response);

    } else {

        $query = "INSERT INTO users (name, age, email, pass, date) VALUES ('$name', '$age', '$email', '$pass', '$date');";
        $result = mysql_query($query, $conexao);

    

            $code = "OK";
            $response = array('resultCode' => $code);

            echo json_encode($response);

    }
?>