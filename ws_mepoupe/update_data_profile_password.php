<?php
/**
 * Created by PhpStorm.
 * User: duh
 * Date: 5/25/17
 * Time: 11:02 PM
 */

    header("Content-Type: text/html; charset=UTF-8", true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    $id = $_POST['id'];
    $actual = $_POST['actual'];
    $newPass = $_POST['newPass'];

    $response = array();

    $sql = mysql_query("select * from users where id = '$id' and pass = '$actual'") or die (mysql_error());
    $row = mysql_num_rows($sql);

    if($row > 0){

        $query = "update users set pass='$newPass' where id=$id;";
        mysql_query($query,$conexao);

        $code = "OK";
        $response = array(
            'resultCode' => $code);

    }else{

        $code = "PASS_ERROR";
        $response = array(
            'resultCode' => $code);

    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>