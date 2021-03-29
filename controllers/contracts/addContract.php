<?php

include "../../model/contracts.php";

$data = [
    $_POST['vehicle'],
    $_POST['plates'],
    $_POST['name'],
    $_POST['passport'],
    'active',
    $_POST['startDate'],
    $_POST['returnDate'],
    $_POST['mileage'],
    $_POST['pricePerDay'],
    $_POST['depozit']
];

$message = $contracts->addNew($data);
header("Location: ../../view/contracts.php?Message=".$message);

?>