<!DOCTYPE html>
<html>
<head>
    <title>exercise-5</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h2>Moon Cake</h2>
<lable>Choose a moon make</lable>
<?php
include 'list_name.php';
?>
<br>
<div id="detail">
</div>

<script>
    function showDetail(data) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("detail").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "detail.php?id=" + data, true);
        xmlhttp.send();
    }
</script>

</body>
</html>