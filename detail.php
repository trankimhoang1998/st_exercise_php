<?php
include 'database.php';
$id = $_REQUEST["id"];
if ($id != '') {
    $sql = "SELECT * FROM cake where id = " . $id;
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<p>Name:" . $row['name'] . "</p>";
        echo "<p>Price: " . $row['price'] . " vnđ</p>";
        echo "<img src='image/" . $row['image'] ."'>";
    }
    $conn->close();
}
?>
