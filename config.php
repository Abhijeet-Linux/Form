<?php

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'logSin');
    

    $con = mysqli_connect(DB_SERVER , DB_USERNAME, DB_PASSWORD, DB_NAME);  

    if ($con == false) {
        die("Error" . mysqli_connect_errno());
    }


?>