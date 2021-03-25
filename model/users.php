<?php

class Users{
    private $pdo;
    function __construct(){
        $host = 'localhost';
        $db = 'rentacar';
        $user ='root';
        $pass='';
        $charset='utf8';
        $dsn="mysql:host=$host; port=3306; dbname=$db; charset=$charset";
        $options=array(
            PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"
        );
        try{
            $this->pdo=new PDO($dsn,$user,$pass,$options);
        }catch(PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }
        // // Povezivanje na bazu
        // $this->pdo = new mysqli('localhost', 'root', '', 'rentacar');
        // if ($this->pdo->connect_error)
        //     print 'Connection failed: '. $this->pdo->connect_error;
        // else
        //     print 'Connected!';
        // // Postavljanje charseta:
        // $this->pdo->set_charset("utf8");
    }
    function preventAI(){
        $this->pdo->query("ALTER TABLE users AUTO_INCREMENT = 0");
    }
    function getAll(){
        $data = $this->pdo->query("SELECT * FROM users ORDER BY name ASC");
        $users = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($users) == 0){
            $data = $this->pdo->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'rentacar' AND TABLE_NAME = 'users'");
            $users = $data->fetchAll(PDO::FETCH_NUM);
        }
        return $users;
    }
    function edit($array, $id){
        $user=$this->pdo->prepare("UPDATE users SET name=?, passport=?, address=?, driversLicence=?,
        issued=?, issuedBy=?, phone=? WHERE id='$id'");
        $user->execute($array);

        ($user->rowCount() > 0)? $message = "Data altered succesfully": $message = "Altering data unsuccesfull!";
        return $message;
    }

}

$users = new Users();

?>