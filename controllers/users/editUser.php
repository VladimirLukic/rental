<?php

include "../../model/users.php";

$id = $_POST['id'];
$data = [
    $_POST['name'],
    $_POST['passport'],
    $_POST['address'],
    $_POST['driversLicence'],
    $_POST['issued'],
    $_POST['issuedBy'],
    $_POST['phone']
];

$message = $users->edit($data, $id);
header("Location: ../../view/users.php?Message=".$message);

?>