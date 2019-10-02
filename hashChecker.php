<?php
session_start();
include "bd.php";

$hash = $_POST['hash'];
$result = $mysqli->query("SELECT * FROM main WHERE MD5(CONCAT(time,password)) = '$hash'");
if($result){
    $result = $result->fetch_array(MYSQLI_ASSOC);
        echo json_encode(['success' => true]);
        $_SESSION['user'] = $result[0]['id'];var_dump( $_SESSION['user']);
    }
    else {
         echo json_encode(['success' => false, "error" => $mysqli -> error]);
    }

?>