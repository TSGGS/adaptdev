<?php
    function prepareSQL($conn, $sql, string $placeholder = "NULL", ...$variables) {
        try {
            //Prepared statement
            $stmt = mysqli_stmt_init($conn);

            //Pre-prepared statement
            mysqli_stmt_prepare($stmt, $sql);

            //Bind parameters to placeholder if query has parameters
            if($placeholder != "NULL") {
                mysqli_stmt_bind_param($stmt, $placeholder, ...$variables);
            }

            //Execute SQL
            mysqli_stmt_execute($stmt);

            //Retrieve data from database
            $fetchall = mysqli_stmt_get_result($stmt);

            return $fetchall;
        } catch(Exception $e) {
            echo '
                <script>
                    alert("DATABASE ERROR: Unable to process query.<br>$e");
                </script>
            ';
        }
    }

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "sensordata";

    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName) or die(mysqli_connect_error());