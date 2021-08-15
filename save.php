<?php

$connection = require_once './connection.php';
    //   echo '<prev>';
    //   var_dump($notes);
    //   echo '</prev>';

echo '<pre>';
var_dump($_POST);
echo'</pre>';

$id = $_POST['id'] ?? '';
if($id){
    $connection->updateNote($id, $_POST);
}else{
    $connection->addNote($_POST);
}

header('location: home.php')
?>