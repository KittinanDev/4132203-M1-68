<?php

header('Content-type:application/json');

include("condb.php");

$method = $_SERVER['REQUEST_METHOD'];
$response = ['status'=>'error','message'=>'Invalida request'];

switch($method){
    case'GET';
    // get all data
        $sql = "SELECT * FROM blog ORDER BY id DESC";
        $stmt = $condb->prepare($sql);
        $stmt->execute();

        
}

echo json_encode($method);