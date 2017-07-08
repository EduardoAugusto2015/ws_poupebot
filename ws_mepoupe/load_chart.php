<?php
    /**
     * Created by PhpStorm.
     * User: duh
     * Date: 5/27/17
     * Time: 12:53 AM
     */

    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    $id = $_POST['id'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $type = $_POST['type'];

/*
    $id = "2";
    $month = "1";
    $year = "2017";
    $type = "input";
*/
    $response = array();

    if($type=="input"){

        $query = mysql_query("SELECT category, value FROM input WHERE YEAR(date) = '$year' and MONTH(date) = '$month' and id_user = '$id'");
        while ($list = mysql_fetch_array($query)) {

            $response [] = array(
                'category' => $list["category"],
                'value' => $list["value"]
            );

        }

        echo json_encode($response, JSON_UNESCAPED_UNICODE);

    }else if($type=="output"){

        $query = mysql_query("SELECT category, value FROM output WHERE YEAR(date) = '$year' and MONTH(date) = '$month' and id_user = '$id'");

        while ($list = mysql_fetch_array($query)) {

            $response [] = array(
                'category' => $list["category"],
                'value' => $list["value"]
            );
        }

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }


?>