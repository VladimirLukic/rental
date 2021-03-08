<?php

include "../controllers/vehicles/getAll.php";
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
        <form action="" method="POST">
            <p id="cancel">
                <img class="cancel" src="../close_icon.png" alt="">
            </p>
            <p>EDIT VEHICLE</p>
            <?php 
                foreach($vehicles[0] as $ind=>$el){
                    ($ind == 'id')? print "<p style='display: none'><span>$ind</span><input class='edit' type='text'></p>":
                    print "<p class='inp'><span>$ind</span><input class='edit' type='text'></p>";
                }
            ?>
            <p>
                <button id="rent">Rent</button>
                <button id="send">Send</button>
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
                foreach($vehicles[0] as $ind=>$el){
                    ($ind == 'id')? "":
                    print "<li class='data'>$ind</li>";
                }
            ?>
        </ul>
    </div>

    <div id="list">
        <?php 
            foreach($vehicles as $el){
                print "<ul class='line'>";
                foreach($el as $ind=>$el1){
                    ($ind == 'id')? print "<li style='display: none'>$el1</li>":
                    print "<li class='data data1'>$el1</li>";
                }
                print "</ul>";
            }
        ?>

                <!-- <ul class="line">
                    <li class="data">12345678912 31242456</li>
                    <li class="data">12345678912 31242456</li>
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>        
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>        
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>        
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>        
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>        
                        <li class="data data1">1234567891231242456</li>
                        <li class="data data1">1234567891231242456</li>        
                </ul> -->
               <!--  <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul>
                <ul class="line">
                    <li class="data">lista1</li>
                    <li class="data">lista2</li>
                        <li class="data data1">lista3</li>
                        <li class="data data1">lista4</li>
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                        <li class="data data1">lista5</li>
                        <li class="data data1">lista6</li>        
                </ul> -->
        <!-- </div> -->
</div>

</body>
<script src="../js/list.js"></script>
<script>
    document.querySelector("#vehicles").style.backgroundColor = 'rgb(248, 216, 216)';
</script>
</html>