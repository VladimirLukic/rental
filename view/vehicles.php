<?php

include "../controllers/vehicles/getAllVehicles.php";
include_once "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles</title>
</head>


<body>
    <!-- popup form -->
    <div id="edit">
        <form action="../controllers/vehicles/editVehicle.php" method="POST">
            <p id="cancel">
                <img class="cancel" src="../close_icon.png" alt="">
            </p>
            <p>EDIT VEHICLE</p>
            <?php 
                foreach($vehicles as $el){
                    foreach($el as $ind=>$el1){
                        if(count($el) < 2){
                            ($el1 == 'id')? print "<p style='display: none;'><span>$el[0]</span><input required name=$el[0] class='edit' type='text'></p>":
                            print "<p class='input'><span>$el[0]</span><input disabled required name=$el[0] class='edit' type='text'></p>";
                        }
                        if(count($el) > 1){
                            ($ind == 'id')? "":print "<li class='data'>$ind</li>";
                        }
                    }
                    break;
                }
                // foreach($vehicles[0] as $ind=>$el){
                //     ($ind == 'id')? print "<p style='display: none'><span>$ind</span><input required name=$ind class='edit' type='text'></p>":
                //     print "<p class='inp'><span>$ind</span><input disabled required name=$ind class='edit' type='text'></p>";
                // }
            ?>
            <p>
                <p id='btn1'>
                    <button id="change">Edit</button>
                    <button id="del">Delete</button>
                </p>
                <p id='btn2'>
                    <button id="rent">Rent</button>
                    <button id="send">Send</button>
                </p>
            </p>
        </form>
    </div>

    <div class="drop-menu vozila">
        <p class="menu-list all">All vehicles</p>
        <p class="menu-list rented">Rented</p>
        <p class="menu-list parked">Parked</p>
        <p class="menu-list add">Add vehicle</p>
    </div>
    <div id="columns">
        <ul class="columns">
            <?php 
                foreach($vehicles as $el){
                    foreach($el as $ind=>$el1){
                        if(count($el) < 2){
                            ($el1 == 'id')? print "<li style='display: none;'>$el[0]</li>":print "<li class='data'>$el[0]</li>";
                        }
                        if(count($el) > 1){
                            ($ind == 'id')? "":print "<li class='data'>$ind</li>";
                        }
                    }
                    break;
                }
            ?>
        </ul>
    </div>

    <?php
        if(isset($_GET['Message'])){
            print "<div id='msg'>".$_GET['Message']."</div>";
        }
    ?>

    <div id="list">
        <?php 
        $switch = true;
        foreach($vehicles as $el){
            if ($switch){
                print "<ul class='line'>";
                foreach($el as $ind=>$el1){
                    if ($el1 == 'id'){
                        print "No data";
                        $switch = false;
                        break;
                    }
                    if($ind == 'make' or $ind == 'name' or $ind == 'id'){ 
                        if($ind == 'id') print "<li style='display: none'>$el1</li>";
                        if($ind == 'make' or $ind == 'name') print "<li class='data data1'>$el1</li>";
                    }else
                    print "<li class='data data2'>$el1</li>";
                }
                print "</ul>";    
            }
        }
        ?>
    </div>

</body>
<script>
    document.querySelector("#vehicles").style.backgroundColor = 'rgb(248, 216, 216)';
</script>
<script src="../js/layout.js"></script>
<script src="../js/search.js"></script>
</html>