<?php

    include("_includes/config.inc");
    include("_includes/dbconnect.inc");
    include("_includes/functions.inc");


    // Checks whether we are logged in
    if (isset($_SESSION['id'])) {

        $sql = "INSERT INTO student (studentid, password, dob, firstname, 
                lastname, house, town, county, country, postcode)
                VALUES (value1, value2, value3, value4, value5, value6, 
                value7, value8, value9, value10)";

        $result = mysqli_query($conn,$sql);

        // INSERT INTO table_name (column1, column2, column3, ...)
        // VALUES (value1, value2, value3, ...);

    } 

?> 