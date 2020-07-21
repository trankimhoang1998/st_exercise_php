<?php
include 'database.php';

$sql = "SELECT * FROM cake";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<select name='cake-data' onChange='showDetail(this.value)'>";
    echo "<option>-----</option>";
    while($row = $result->fetch_assoc()) {
        echo "<option value=". $row["id"]. ">" . $row["name"]. "</option>";
    }
    echo "</select>";
} else {
    echo "0 results";
}
$conn->close();