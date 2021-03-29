<?php

include "../../model/vehicles.php";

$id = $_POST['id'];
$plates = $_POST['plates'];

$message = $vehicles->delete($id, $plates);
header("Location: ../../view/vehicles.php?Message=".$message);

?>