<?php

    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    /*

    $name_goal = "comprar roupa";
    $total_value = 100;
    $id_user = 2;
    $date_insert = date("Y-m-d H:i:s");

*/

    $name_goal = $_POST['nameGoal'];
    $total_value = $_POST['value'];
    $id_user = $_POST['id'];
    $date_insert = date("Y-m-d H:i:s");
 
    $response = array();

        $query = "INSERT INTO goal (name_goal, total_value, id_user, date_insert) VALUES ('$name_goal', '$total_value', '$id_user', '$date_insert');";
        $result = mysql_query($query, $conexao);

        if ($result) {

            $code = "OK";
            $response = array('resultCode' => $code);

            echo json_encode($response);

        }
    
?>