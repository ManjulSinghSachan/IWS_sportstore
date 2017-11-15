<?php

    require 'core_file.php';
    $name = $_POST['name'];

    echo $name;
    $connect = mysqli_connect("localhost","root","kanishk","sportskart");

    $sql = "DELETE FROM cartpage WHERE product_id=$name";
    mysqli_query($connect, $sql);

 ?>
