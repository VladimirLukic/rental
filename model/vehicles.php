<?php

class Vehicles{
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
        $this->pdo->query("ALTER TABLE vehicles AUTO_INCREMENT = 0");
    }

    function getAll(){
        $data = $this->pdo->query("SELECT * FROM vehicles ORDER BY make ASC");
        $vehicles = $data->fetchAll(PDO::FETCH_ASSOC);
        if(count($vehicles) == 0){
            $data = $this->pdo->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'rentacar' AND TABLE_NAME = 'vehicles'");
            $vehicles = $data->fetchAll(PDO::FETCH_NUM);
        }
        return $vehicles;
    }

    function edit($array, $id){
        $data=$this->pdo->prepare("UPDATE vehicles SET make=?, plates=?, year=?, registration=?,
        mileage=?, serviceInt=?, tires=? WHERE id='$id'");
        $data->execute($array);

        ($data->rowCount() > 0)? $message = "Data altered succesfully": $message = "Altering data unsuccesfull!";
        return $message;
    }
    
    function addNew($array){
        $data = $this->pdo->prepare("INSERT INTO vehicles (make, plates, status, year, registration,
        mileage, serviceInt, tires) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $data->execute($array);

        ($data->rowCount() > 0)? $message = "Vehicle added succesfully": $message = "Vehicle not added!";
        return $message;
    }
    
    function delete($id){
        $data = $this->pdo->query("SELECT * FROM vehicles WHERE id='$id'");
        $delete = $data->fetchAll(PDO::FETCH_ASSOC);
        if($delete[0]['status'] == 'parked'){
            $this->pdo->query("DELETE FROM vehicles WHERE id='$id'");
            $message = "Vehicle is deleted";
        }else
        $message = "Vehicle is in use and can not be deleted!";

        return $message;
    }

}

$vehicles = new Vehicles();

?>