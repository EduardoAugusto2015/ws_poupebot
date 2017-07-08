<?php
    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    $id = $_POST['id'];

    $response = array();

        $queryGoal = "DELETE FROM goal WHERE id='$id'";
        mysql_query($queryGoal, $conexao);

		$queryOutput = "DELETE FROM output WHERE id_goal='$id'";
        mysql_query($queryOutput, $conexao);
        
        if ($result) {

            $code = "OK";
            $response = array('resultCode' => $code);

            echo json_encode($response);

        }

?>