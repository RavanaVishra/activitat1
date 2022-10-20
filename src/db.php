<?php

function connectMysql(string $dsn, string $dbuser, string $dbpass):PDO {
    try{
        $db = new PDO($dsn, $dbuser, $dbpass);
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

    }catch(PDOException $e){
        die( $e->getMessage());
        
    }
    return $db;
}
/**
 * authentication function
 * @param string $db
 * @param string $email
 * @param string $password
 * @return boolean
 */

function auth(PDO $db, string $email, string $password):bool {
    $stmt = $db->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");
    $res = $stmt->execute([':email'=>$email]);

    if($stmt->rowCount()==1) {
        $user = $stmt->fetchAll()[0];
        if(password_verify($password,$user->password)){ 
            //login correcto
            $_SESSION['user'] = $user;
            header('Location:?url=dashboard');
            return true;
        }
    }
    return false;
}