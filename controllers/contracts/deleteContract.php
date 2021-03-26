<?php

include "../../model/contracts.php";

$id = $_POST['id'];

$message = $contracts->delete($id);
header("Location: ../../view/contracts.php?Message=".$message);

?>