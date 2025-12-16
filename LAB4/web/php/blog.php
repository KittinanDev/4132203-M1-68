<?php

header('Content-type:application/json');

include("condb.php");

$method = $_SERVER['REQUEST_METHOD'];
$response = ['status'=>'error','message'=>'Invalide request'];

switch($method){
    case 'GET':
        //get all data
        $sql = "SELECT * FROM blog ORDER BY id DESC";
        $stmt = $condb->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $blog = [];
        
        while($row = $result->fetch_assoc()){
            $blog[] = $row;
        }

        $response = ['status'=>'success','data'=>$blog];

        break;

    case 'POST':
        $comment = $_POST['blog'] ?? null;
        if($comment){
            $sql = "INSERT INTO blog (comment) VALUES (?)";
            $stmt = $condb->prepare($sql);
            $stmt->bind_param("s",$comment);
            
            }else{
                $response = ['status'=>'error','message'=>'Comment is null'];
            }
            break;
}

echo json_encode($response);