<?php

include "../../model/users.php";

$data = [
    $_POST['name'],
    $_POST['passport'],
    'inactive',
    $_POST['address'],
    $_POST['driversLicence'],
    $_POST['issued'],
    $_POST['issuedBy'],
    $_POST['phone']
];

$message = $users->addNew($data);
header("Location: ../../view/users.php?Message=".$message);

?>