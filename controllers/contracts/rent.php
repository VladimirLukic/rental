<?php

include "../../model/contracts.php";

if(isset($_POST['make']) and isset($_POST['plates'])){
    $array = [$_POST['make'], $_POST['plates'], 'vehicle', 'plates'];
    $path = 'users.php';
}
if(isset($_POST['name']) and isset($_POST['passport'])){
    $array = [$_POST['name'], $_POST['passport'], 'name', 'passport'];
    $path = 'vehicle.php';
}
else{
    $message = 'You havent make any selection!';
    header("Location: ../../view/contracts.php?Message=".$message);
}

$message = $contracts->rent($array);
header("Location: ../../view/".$path."?Message=".$message);

?>