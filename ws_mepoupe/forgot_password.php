<?php
    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    $email=$_POST['email'];

    $query=mysql_query("SELECT email FROM users");

    while($findEmail=mysql_fetch_array($query)){

        $emailFound=$findEmail['email'];

        if($email==$emailFound){

            $generateNewPass= substr(md5(time()),0,8);
            $newPass=md5($generateNewPass);

            $queryUpdatePass = "update users set pass='$newPass' where email ='$emailFound';";
            mysql_query($queryUpdatePass);

            $recover = "OK";
            $response = array('resultCode' => $recover);
            echo json_encode($response);

        }else{

            $recover = "ERROR";
            $response = array('resultCode' => $recover);
            echo json_encode($response);

        }
    }
?>