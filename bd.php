<?php

$host = 'localhost'; // адрес сервера 
$database = 'chat'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль
// подключаемся к серверу
$mysqli = new mysqli ($host, $user, $password, $database); 
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//$e = $_POST['email'];

?>