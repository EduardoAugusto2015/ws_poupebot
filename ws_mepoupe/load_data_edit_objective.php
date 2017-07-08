<?php

    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    /*
    $id_user = "4";
    $idObjective = "10";
    $id_user = $_POST['id'];
    $idObjective = $_POST['idObjective'];
    */

    $id_user = $_POST['id'];
    $idObjective = $_POST['idObjective'];

    $response = array();

    $query = mysql_query("SELECT name_goal, total_value FROM goal where id_user = '$id_user' AND id = '$idObjective'");
    $list = mysql_fetch_array($query);

    $name_goal = $list["name_goal"];
    $total_value = $list["total_value"];
         
        $code = "OK";
        $response = array(
            'resultCode' => $code,
            'nameGoal' => $name_goal,
            'totalValue' => $total_value
        );

        echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>