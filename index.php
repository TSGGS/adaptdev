<?php
    require("includes/header.php");
?>        
        <title>Temperature Sensor | Home</title>
    <body>
        <div class="main">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>Temperature</th>
                        <th>Humidity</th>
                        <th>Water Level</th>
                        <th>pH Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM data;";
                        $result = prepareSQL($conn, $sql);
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_array($result)) {
                                echo '
                                <tr>
                                    <td>'.$row["timestamp"].'</td>
                                    <td>'.$row["temperature"].'</td>
                                    <td>'.$row["humidity"].'</td>
                                    <td>'.$row["waterLvl"].'</td>
                                    <td>'.$row["PhLvl"].'</td>
                                    <td>
                                        <a href="./update.php?no='.$row["dataNo"].'&type=update">UPDATE</a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="./index.php?no='.$row["dataNo"].'&type=delete">DELETE</a>
                                    </td>
                                </tr>
                                ';
                            }
                        } else {
                            echo '
                            <tr>
                                <td colspan=5>No data available</td>
                            </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
    <?php
        if(isset($_GET["type"]) && $_GET["type"] == "delete") {
            $sql = "DELETE FROM data WHERE dataNo=?";
            prepareSQL($conn, $sql, "i", $_GET["no"]);

            echo '
                <script>
                    window.location.href = "index.php";
                </script>      
            ';
        }
    ?>
</html>