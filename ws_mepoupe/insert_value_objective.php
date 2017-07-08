<?php
    header("Content-Type: text/html; charset=UTF-8",true);
    include("dbconnect.php");
    mysql_set_charset('utf8');

    /*
    $id = "4"; 
    $idObjective = "4";
    $value = "500";
    $date = "2017/5/4";

    $id = $_POST['id']; 
    $idObjective = $_POST['idObjective'];
    $value = $_POST['value'];
    $date = $_POST['date'];

    */

    $id = $_POST['id']; 
    $idObjective = $_POST['idObjective'];
    $value = $_POST['value'];
    $date = $_POST['date'];

    $response = array();

    $resultRecipe = mysql_query("SELECT SUM(value) AS suminput from input where id_user = '$id'");
    $rowRecipe=mysql_fetch_assoc($resultRecipe);
    $totalRecipe = $rowRecipe['suminput'];

    $resultExpense = mysql_query("SELECT SUM(value) AS sumoutput from output where id_user = '$id'");
    $rowExpense=mysql_fetch_assoc($resultExpense);
    $totalExpense = $rowExpense['sumoutput'];

    if($totalRecipe==null){
        $totalRecipe = 0;
    }

    if($totalExpense == null){
        $totalExpense = 0;

    }

    $total = $totalRecipe - $totalExpense;

    if($value > $total){

        $code = "ERROR";
        $response = array(
            'resultCode' => $code,
        );

    }else{

        $query = mysql_query("SELECT value_economy, name_goal FROM goal where id = '$idObjective' and id_user = '$id'");
        $list = mysql_fetch_array($query);

        $valueTotal = $list["value_economy"];
        $description = $list["name_goal"];

        $total = $value + $valueTotal;

        $queryGoal = "update goal set value_economy='$total' where id=$idObjective;";
        mysql_query($queryGoal, $conexao);

        $category = "Contas";
        $queryOutput = "INSERT INTO output (id_user, value, date, category, description, id_goal) VALUES ('$id', '$total', '$date', '$category', '$description', '$idObjective');";
        mysql_query($queryOutput, $conexao);

        $code = "OK";
        $response = array(
            'resultCode' => $code,
        );
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>