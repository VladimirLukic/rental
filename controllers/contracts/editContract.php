<?php

include "../../model/contracts.php";

$id = $_POST['id'];
$data = [
    $_POST['vehicle'],
    $_POST['plates'],
    $_POST['name'],
    $_POST['passport'],
    $_POST['status'],
    $_POST['startDate'],
    $_POST['returnDate'],
    $_POST['mileage'],
    $_POST['pricePerDay'],
    $_POST['depozit']
];

$message = $contracts->edit($data, $id);
header("Location: ../../view/contracts.php?Message=".$message);

?>