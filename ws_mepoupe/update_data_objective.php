<?php

    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');
/*

	id = $_POST['id'];
    $idObjective = $_POST['idObjective'];
    $nameGoal = $_POST['nameGoal'];
    $totalValue = $_POST['totalValue'];
*/

	$id = $_POST['id'];
    $idObjective = $_POST['idObjective'];
    $nameGoal = $_POST['nameGoal'];
    $totalValue = $_POST['totalValue'];

    $queryGoal= "update goal set name_goal='$nameGoal', total_value='$totalValue' where id_user='$id' and id='$idObjective';";
    mysql_query($queryGoal, $conexao);

    $queryOut= "update output set description='$nameGoal', value='$totalValue' where id_user='$id' and id_goal='$idObjective';";
    mysql_query($queryOut, $conexao);

        $code = "OK";
        $response = array(
            'resultCode' => $code,
  
        );

    echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>