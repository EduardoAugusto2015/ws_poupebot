<?php
header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    $response = array();
    mysql_set_charset('utf8');

/*
    $id = 0;
*/
    $id = $_POST['id'];

    $query = mysql_query("SELECT id, value, date, category, description FROM input WHERE id_user='$id'");
    while ($list = mysql_fetch_array($query)) {

        $response [] = array(
            'id' => $list["id"],
            'category' => $list["category"],
            'description' => $list["description"],
            'value' => $list["value"],
            'date' => $list["date"]

            );
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>