<?php

    require 'core_file.php';
    $name = $_POST['name'];

    //echo $name;
    $connect = mysqli_connect("sql12.freemysqlhosting.net:3306","sql12206252","qDhsLVHUV4","sql12206252");

    $sql = "DELETE FROM cartpage WHERE product_id=$name";
    mysqli_query($connect, $sql);

 ?>
