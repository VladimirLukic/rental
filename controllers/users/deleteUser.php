<?php

include "../../model/users.php";

$id = $_POST['id'];
$passport = $_POST['passport'];

$message = $users->delete($id, $passport);
header("Location: ../../view/users.php?Message=".$message);

?>