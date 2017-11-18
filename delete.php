<<<<<<< b4bc6392ea8e3c5a913ec907945fdb7ef67ecde9
<?php

    require 'core_file.php';
    $name = $_POST['name'];

    echo $name;
    $connect = mysqli_connect("localhost","root","kanishk","sportskart");

    $sql = "DELETE FROM cartpage WHERE product_id=$name";
    mysqli_query($connect, $sql);

 ?>
=======
<?php

    require 'core_file.php';
    $name = $_POST['name'];

    echo $name;
    $connect = mysqli_connect("localhost","root","","sportskart");

    $sql = "DELETE FROM cartpage WHERE product_id=$name";
    mysqli_query($connect, $sql);

 ?>
>>>>>>> recommendation
