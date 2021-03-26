<?php

class Contracts{
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
        $this->pdo->query("ALTER TABLE contracts AUTO_INCREMENT = 0");
    }

    function getAll(){
        $data = $this->pdo->query("SELECT * FROM contracts WHERE status='active' ORDER BY id ASC");
        $contracts = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($contracts) == 0){
            $data = $this->pdo->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'rentacar' AND TABLE_NAME = 'contracts'");
            $contracts = $data->fetchAll(PDO::FETCH_NUM);
        }
        return $contracts;
    }

    function edit($array, $id){
        $contract = $this->pdo->prepare("UPDATE contracts SET vehicle=?, plates=?, name=?, passport=?, startDate=?,
        returnDate=?, mileage=?, pricePerDay=?, depozit=? WHERE id='$id'");
        $contract->execute($array);

        ($contract->rowCount() > 0)? $message = "Data altered succesfully": $message = "Altering data unsuccesfull!";
        return $message;
    }

    function addNew($array){
        $data = $this->pdo->prepare("INSERT INTO contracts (vehicle, plates, name, passport, status,
        startDate, returnDate, mileage, pricePerDay, depozit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $data->execute($array);

        ($data->rowCount() > 0)? $message = "Contract created succesfully": $message = "Contract not created!";
        return $message;
    }

    function delete($id, $status){
        if($status == 'active'){
            $data = $this->pdo->query("UPDATE contracts SET status='archive' WHERE id='$id'");
            $state = 'archived';
        }
        if($status == 'archive'){
            $data = $this->pdo->query("DELETE FROM contracts WHERE id='$id'");
            $state = 'deleted';
        }
    
        ($data->rowCount() > 0)? $message = "Contract is $state": $message = "Contract is not $state!";
        return $message;
    }

    function deactivate($plates, $passport){
        $data = $this->pdo->query("SELECT * FROM contracts WHERE passport='$passport'");
        $contracts = $data->fetchAll(PDO::FETCH_ASSOC);
        (count($contracts) > 1)? "":
            $this->pdo->query("UPDATE users SET status='inactive' WHERE passport='$passport'");

        $park = $this->pdo->query("UPDATE vehicles SET status='parked' WHERE plates='$plates'");
        ($park->rowCount() > 0)? $status = true: $status = false;
        return $status;
    }

}

$contracts = new Contracts();

?>