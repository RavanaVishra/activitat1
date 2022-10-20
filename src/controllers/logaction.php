<?php
require 'src/db.php';

//coger $_REQUEST['email'], i ['password']
//comprobar que existen en la base de datos
//Dos ejemplos posibles
//1. Existe **> dashboard y abrimos sesión de usuario
//2. No existe **> o volvemos a home o nos quedamos en login

$db = connectMysql($dsn,$dbuser,$dbpass);

if (!empty($_POST['email'])&&!empty($_POST['password'])) {
    if (isset($_POST['email'])&& isset($_POST['password'])) {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        if (auth($db,$email,$password)) {
            //true
            header('Location:?url=dashboard');
        }else {
            //false
            header('Location:?url=login');
        }
    }
}