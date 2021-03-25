<?php

include "../../model/vehicles.php";

$data = [
    $_POST['make'],
    $_POST['plates'],
    'parked',
    $_POST['year'],
    $_POST['registration'],
    $_POST['mileage'],
    $_POST['serviceInt'],
    $_POST['tires']
];

$message = $vehicles->addNew($data);
header("Location: ../../view/vehicles.php?Message=".$message);

?>