<?php
    header("Content-Type: text/html; charset=UTF-8",true);

    include("dbconnect.php");
    mysql_set_charset('utf8');

    /*

    $id = $_POST['id'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $id = "2";
    $month = "4";
    $year = "2017";
*/

    $id = $_POST['id'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $response = array();

    $resultRecipe = mysql_query("SELECT SUM(value) AS suminput from input where YEAR(date) = '$year' and MONTH(date) = '$month' and id_user = '$id'");
    $rowRecipe=mysql_fetch_assoc($resultRecipe);
    $totalRecipe = $rowRecipe['suminput'];

    $resultExpense = mysql_query("SELECT SUM(value) AS sumoutput from output where YEAR(date) = '$year' and MONTH(date) = '$month' and id_user = '$id'");
    $rowExpense=mysql_fetch_assoc($resultExpense);
    $totalExpense = $rowExpense['sumoutput'];


    if($totalRecipe==null){
        $totalRecipe = 0;
    }

    if($totalExpense == null){
        $totalExpense = 0;

    }

    $totalMonth = $totalRecipe - $totalExpense;

    $code = "OK";
    $response = array(
        'resultCode' => $code,
        'totalRecipe' => $totalRecipe,
        'totalExpense' => $totalExpense,
        'totalMonth' => $totalMonth
    );


    echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>