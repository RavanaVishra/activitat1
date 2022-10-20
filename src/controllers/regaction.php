<?php

if (!empty($_POST['username']) 
    && !empty($_POST['email'])
    && !empty($_POST['password'])) {
        //Filtrar
        $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
        //Sentencia
        $db = connectMysql($dsn,$dbuser,$dbpass);
        $stmt = $db->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
        $res = $stmt->execute([1=>$username,
                2=>$email,
                3=>password_hash($password,['cost'=>4])]);
        if($res) {
            //O hacemos login y vamos a dashboard
            //O vamos a login
            $_SESSION['user']['username'] = $username;
            $_SESSION['user'](obj)->username = $username;
            header('Location:?url=dashboard');
        }
    }