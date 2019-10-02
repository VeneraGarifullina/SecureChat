<?php
include "bd.php";

if (isset($_POST['login']) && isset($_POST['password'])){
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    

    $result = $mysqli->query("INSERT INTO main (login, password) VALUES ('$login', '$password')");

    if($result){
        echo json_encode(['success' => true]);
        $success_msg =" Регистрация прошла успешно";
    }
    else {
         echo json_encode(['success' => false, "error" => "Ошибка регистрации"]);
    }

}

?>