<?php

include "../../model/vehicles.php";

$id = $_POST['id'];
$data = [
    $_POST['make'],
    $_POST['plates'],
    $_POST['status'],
    $_POST['year'],
    $_POST['registration'],
    $_POST['mileage'],
    $_POST['serviceInt'],
    $_POST['tires']
];

$message = $vehicles->edit($data, $id);
header("Location: ../../view/vehicles.php?Message=".$message);

?>