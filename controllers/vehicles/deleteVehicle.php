<?php

include "../../model/vehicles.php";

$id = $_POST['id'];

$message = $vehicles->delete($id);
header("Location: ../../view/vehicles.php?Message=".$message);

?>