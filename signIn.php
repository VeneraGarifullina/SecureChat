<?php
include "bd.php";


if (isset($_POST['login'])){
    require "bd.php";
    $login = $_POST['login'];
    //$password = $_POST['password'];
    $query = $mysqli->query("SELECT * FROM main WHERE login = '$login'");
    
    if ($query->num_rows != 1) {
        echo json_encode(['success' => false, 'error' => "Такого пользователя не существует"]);
        exit;
    }
    
    $userInfo = $query->fetch_array(MYSQLI_ASSOC);

//    if ($userInfo['password'] == md5($password)) {
        $date = date('Y-m-d H:i:s');
        $result = $mysqli->query("UPDATE main SET time = '$date' WHERE id = '{$userInfo['id']}'");
        //Здесь стартуем сессию авторизации если нужно
        echo json_encode(['success' => true,"time" => $date]);
        exit;
//    } else {
//        echo json_encode(['success' => false, "error" => "Неверный пароль"]);
//        exit;
//    }
}