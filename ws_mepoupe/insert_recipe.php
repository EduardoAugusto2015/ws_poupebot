<?php
    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    $id = $_POST['id'];
    $value = $_POST['value'];
    $date = $_POST['date'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $response = array();

        $query = "INSERT INTO input (id_user, value, date, category, description) VALUES ('$id', '$value', '$date', '$category', '$description');";
        $result = mysql_query($query, $conexao);

        if ($result) {

            $code = "OK";
            $response = array('resultCode' => $code);

            echo json_encode($response);

        }
    
?>