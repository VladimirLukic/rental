<?php

include "../../model/users.php";

$id = $_POST['id'];

$message = $users->delete($id);
header("Location: ../../view/users.php?Message=".$message);

?>