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
        $data = $this->pdo->query("SELECT * FROM contracts ORDER BY id ASC");
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

    function delete($id){
        $data = $this->pdo->query("SELECT * FROM contracts WHERE id='$id'");
        $delete = $data->fetchAll(PDO::FETCH_ASSOC);
        $plates = $delete[0]['plates'];
        $passport = $delete[0]['passport'];
        $userCheck = $this->userCheck($delete[0]['passport']);

        if($delete[0]['status'] == 'archive'){
            $this->pdo->query("DELETE FROM contracts WHERE id='$id'");
            ($data->rowCount() > 0)? $message = "Contract is deleted": $message = "Contract is not deleted!";
        }else{
            $this->pdo->query("UPDATE vehicles SET status='parked' WHERE plates='$plates'");
            ($userCheck == 1)? $this->pdo->query("UPDATE users SET status='inactive' WHERE passport='$passport'"):"";
            $this->pdo->query("UPDATE contracts SET status='archive' WHERE id='$id'");
            ($data->rowCount() > 0)? $message = "Contract is archived": $message = "Contract is not archived!";
        }
        return $message;
    }

    function userCheck($passport){
        $data = $this->pdo->query("SELECT * FROM contracts WHERE passport='$passport'");
        $users = $data->fetchAll(PDO::FETCH_ASSOC);
        return count($users);
    }

    function draft(){
        $data = $this->pdo->query("SELECT * FROM contracts WHERE status='draft'");
        $draft = $data->fetchAll(PDO::FETCH_NUM);
        return count($draft);
    }

    function rent($array){
        if($this->draft() == 1){
            $data = $this->pdo->query("INSERT INTO contracts ('$array[2]', '$array[3]') VALUES ($array[0], $array[1]) WHERE status='draft'");
            $data->execute($array);
            ($data->rowCount() > 0)? $message = "Contract drafted succesfully!": $message = "Contract not drafted!";
        }else{
            $data = $this->pdo->query("INSERT INTO contracts ('$array[2]', '$array[3]', status) VALUES ($array[0], $array[1], 'draft')");
            ($data->rowCount() > 0)? $message = "Contract drafted succesfully!": $message = "Contract not drafted!";
        }
        return $message;
    }

}

$contracts = new Contracts();

?>