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
        return $vehicles;
    }
    function addNew($array){
        $data = $this->pdo->prepare("INSERT INTO vehicles (make, plates, status, year, registration,
        mileage, serviceInt, tires) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $data->execute($array);


        if($data->rowCount()>0){
            print "Uspesno ste izmenili podatke vozila";
        }
        if($data->rowCount()==0){
            print "Podaci su ostali neizmenjeni";
        }

    }
    function edit($array, $id){
        $vehicle=$this->pdo->prepare("UPDATE vehicles SET make=?, plates=?, year=?, registration=?,
        mileage=?, serviceInt=?, tires=? WHERE id='$id'");
        $vehicle->execute($niz);


        if($vehicle->rowCount()>0){
            print "Uspesno ste izmenili podatke vozila";
        }
        if($vehicle->rowCount()==0){
            print "Podaci su ostali neizmenjeni";
        }
    }
}

$vehicles = new Vehicles();

?>