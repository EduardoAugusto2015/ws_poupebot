<?php

    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    $response = array();
    mysql_set_charset('utf8');

/*
    $id = "2";
*/

    $id = $_POST['id'];


    $query = mysql_query("SELECT id, name_goal, total_value, value_economy FROM goal");
    while ($list = mysql_fetch_array($query)) {

        $response [] = array(
            'id' => $list["id"],
            'nameGoal' => $list["name_goal"],
            'totalValue' => $list["total_value"],
            'value' => $list["value_economy"]
            );
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);

    
?>