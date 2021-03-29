<?php

include "../../model/contracts.php";

$id = $_POST['id'];
$status = $_POST['status'];
$plates = $_POST['plates'];
$passport = $_POST['passport'];

$deactivate = $contracts->deactivate($plates, $passport);
($deactivate)?
    $message = $contracts->delete($id, $status):
    $message = "The vehicle can't be parked!";

header("Location: ../../view/contracts.php?Message=".$message);

?>