<?php
    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    /*
    $id = "2";
    $id = $_POST['id'];
    */

    $id = $_POST['id'];

    $response = array();

    $resultRecipe = mysql_query("SELECT SUM(value) AS suminput from input where id_user = '$id'");
    $rowRecipe=mysql_fetch_assoc($resultRecipe);
    $totalRecipe = $rowRecipe['suminput'];

    $resultExpense = mysql_query("SELECT SUM(value) AS sumoutput from output where  id_user = '$id'");
    $rowExpense=mysql_fetch_assoc($resultExpense);
    $totalExpense = $rowExpense['sumoutput'];

    if($totalRecipe==null){
        $totalRecipe = 0;
    }

    if($totalExpense == null){
        $totalExpense = 0;

    }

    $total = $totalRecipe - $totalExpense;

    $code = "OK";
    $response = array(
        'resultCode' => $code,
        'totalRecipe' => $total,
    );


    echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>