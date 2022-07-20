<?php
    require("includes/header.php");
?>
    <title>Temperature Sensor | Insert</title>
    <body>
        <div class="insert">
            <h1>Insert Data</h1>
            <form action="insert.php" method="post">
                <div class="row">
                    <div class="col-1">
                        <label class="lbl" for="temp">Temperature (deg C)</label>
                    </div>
                    <div class="col-2">
                        <input type="number" step="0.01" class="input" name="temp" id="temp" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label class="lbl" for="temp">Humidity</label>
                    </div>
                    <div class="col-2">
                        <input type="number" step="0.01" class="input" name="humid" id="humid" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label class="lbl" for="temp">Water Level</label>
                    </div>
                    <div class="col-2">
                        <input type="number" step="0.01" class="input" name="water" id="water" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <label class="lbl" for="temp">pH Level</label>
                    </div>
                    <div class="col-2">
                        <input type="number" step="0.01" class="input" name="pHlvl" id="pHlvl" min=0 max=14 required>
                    </div>
                </div>
                <div class="rowSubmit">
                    <input type="submit"  name="submit" id="submit">
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

        $sql = "INSERT INTO data VALUES (null, ?, ?, ?, ?, ?)";
        prepareSQL($conn, $sql, "dddds", $temp, $humid, $water, $pHlvl, null);
        echo '
            <script>
                window.location.href = "index.php";
            </script>      
        ';
    }
