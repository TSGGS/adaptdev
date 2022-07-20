<?php
    require("includes/header.php");

    if(isset($_GET["type"]) && $_GET["type"] == "update") {
        $sql = "SELECT * FROM data WHERE dataNo=?";
        $result = prepareSQL($conn, $sql, "i", $_GET["no"]);
        $row = mysqli_fetch_array($result);

        $no = $row["dataNo"];
        $temp = $row["temperature"];
        $humid = $row["humidity"];
        $water = $row["waterLvl"];
        $pHlvl = $row["PhLvl"];

    } else {
        $no = "";
        $temp = "";
        $humid = "";
        $water = "";
        $pHlvl = "";
    }
?>
    <title>Temperature Sensor | Update</title>
    <body>
        <div class="insert">
            <h1>Update Data</h1>
            <form action="update.php" method="post">
                <div class="row">
                    <div class="col-1">
                        <label class="lbl" for="temp">Temperature (deg C)</label>
                    </div>
                    <div class="col-2">
                        <input type="number" step="0.01" class="input" name="temp" id="temp" value=<?php echo $temp; ?> required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label class="lbl" for="temp">Humidity</label>
                    </div>
                    <div class="col-2">
                        <input type="number" step="0.01" class="input" name="humid" id="humid" value=<?php echo $humid; ?> required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label class="lbl" for="temp">Water Level</label>
                    </div>
                    <div class="col-2">
                        <input type="number" step="0.01" class="input" name="water" id="water" value=<?php echo $water; ?> required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label class="lbl" for="temp">pH Level</label>
                    </div>
                    <div class="col-2">
                        <input type="number" step="0.01" class="input" name="pHlvl" id="pHlvl" min=0 max=14 value=<?php echo $pHlvl; ?> required>
                    </div>
                </div>
                <div class="rowSubmit">
                    <button type="submit"  name="submit" id="submit" value=<?php echo $no?>>Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>

<?php
    if(isset($_POST["submit"])) {
        $temp = $_POST["temp"];
        $humid = $_POST["humid"];
        $water = $_POST["water"];
        $pHlvl = $_POST["pHlvl"];

        $sql = "UPDATE data SET temperature=?, humidity=?, waterLvl=?, PhLvl=? WHERE dataNo=?";
        prepareSQL($conn, $sql, "ddddd", $temp, $humid, $water, $pHlvl, $_POST["submit"]);
        echo '
            <script>
                window.location.href = "index.php";
            </script>      
        ';
    }
