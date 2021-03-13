<?php

include "../controllers/contracts/getAllcontracts.php";
include_once "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contracts</title>
</head>
<body>
    <!-- popup form -->
    <div id="edit">
        <form action="" method="POST">
            <p id="cancel">
                <img class="cancel" src="../close_icon.png" alt="">
            </p>
            <p>EDIT USER</p>
            <?php             
                foreach($contracts[0] as $ind=>$el){
                    ($ind == 'id')? print "<p style='display: none'><span>$ind</span><input required name=$ind class='edit' type='text'></p>":
                    print "<p class='inp'><span>$ind</span><input required name=$ind class='edit' type='text'></p>";
                }
            ?>
            <p>
                <button id="rent">Rent</button>
                <button id="send">Send</button>
            </p>
        </form>
    </div>
    <div class="drop-menu vozila">
        <p class="menu-list all">All contracts</p>
        <p class="menu-list rented">Active</p>
        <p class="menu-list parked">Inactiv</p>
        <p class="menu-list add">Add user</p>
    </div>
    <div id="columns">
        <ul class="columns">
            <?php 
                if(count($contracts) == 0){
                    print "<li class='data'>No new contracts</li>";
                    return;
                }
                
                foreach($contracts[0] as $ind=>$el){
                    ($ind == 'id')? "":
                    print "<li class='data'>$ind</li>";
                }
            ?>
        </ul>
    </div>

    <div id="list">
        <?php 
            foreach($contracts as $el){
                print "<ul class='line'>";
                foreach($el as $ind=>$el1){
                    ($ind == 'id')? print "<li style='display: none'>$el1</li>":
                    print "<li class='data'>$el1</li>";
                }
                print "</ul>";
            }
        ?>
    </div>

</body>
<script>
    document.querySelector("#contracts").style.backgroundColor = 'rgb(248, 216, 216)';
</script>
<script src="../js/layout.js"></script>
<script src="../js/search.js"></script>
</html>