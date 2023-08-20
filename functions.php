<?php
  function filterRequest($requestname){
    return htmlspecialchars(strip_tags($_POST[$requestname]));
 
  }

  function getAllSata($table,$where=null,$values=null){
      
    global $con;
    $data=array();
    $stmt=$con->prepare("SELECT * FROM $table WHERE $where");

    $stmt->execute($values);
    $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $count=$stmt->rowCount();

    if($count >0){
      echo json_encode(array("status" => "success","data" =>$data));
    }else{
      echo json_encode(array("status" =>"failure"));
    }

    return $count;
  }