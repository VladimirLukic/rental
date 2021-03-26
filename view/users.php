<?php

include "../controllers/users/getAllUsers.php";
include_once "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <!-- popup form -->
    <div id="edit">
        <p id="actRent" style='display: none'>../controllers/users/rentUser.php</p>
        <form action="../controllers/users/editUser.php" method="POST">
            <p id="cancel">
                <img class="cancel" src="../close_icon.png" alt="">
            </p>
            <p>USER</p>
            <?php 
            if(count($users[0]) < 2){
                foreach($users as $el){
                    if($el[0] == 'id' or $el[0] == 'status')
                        print "<p style='display: none;'><span>$el[0]</span><input required name=$el[0] class='edit' type='text'></p>";
                    else
                        print "<p class='inp'><span>$el[0]</span><input required name=$el[0] class='edit' type='text'></p>";
                }
            }
            if(count($users[0]) > 1){
                foreach($users as $el){
                    foreach($el as $ind=>$el1){
                        if($ind == 'id' or $ind == 'status')
                            print "<p style='display: none'><span>$ind</span><input name=$ind class='edit' type='text'></p>";
                        else
                        print "<p class='inp'><span>$ind</span><input disabled required name=$ind class='edit' type='text'></p>";        
                    }
                    break;
                }
            }    
            ?>
            <p>
                <p id='btn1'>
                    <button id="rent">Rent</button>
                    <button id="del" value='../controllers/users/deleteUser.php'>Delete</button>
                    <button id="change">Edit</button>
                </p>
                <p id='btn2'>
                    <button id="send" value='../controllers/users/addUser.php'>Send</button>
                </p>
            </p>
        </form>
    </div>
    <div class="drop-menu vozila">
        <p class="menu-list all">All users</p>
        <p class="menu-list rented">Active</p>
        <p class="menu-list parked">Inactiv</p>
        <p class="menu-list add">Add user</p>
    </div>
    <div id="columns">
        <ul class="columns">
            <?php 
                foreach($users as $el){
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
        foreach($users as $el){
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
    document.querySelector("#users").style.backgroundColor = 'rgb(248, 216, 216)';
</script>
<script src="../js/layout.js"></script>
<script src="../js/search.js"></script>
</html>