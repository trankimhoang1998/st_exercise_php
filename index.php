<?php

$students = [
    ["Gussie Fahey", "PHP_27", 90, 89, 67],
    ["Germaine Feeney", "Java_06", 80, 77, 65],
    ["Marjory Weissnat", "Java_10", 67, 87, 70],
    ["Hollie Wintheiser", "PHP_27", 79, 78, 56]
];
echo "<h2>Dữ liệu ban đầu</h2>";
echo "<table style=\"width:300px\">";
echo "<tr>";
echo " <th>Name</th>";
echo " <th>Class</th>";
echo " <th>CSS class</th>";
echo " <th>PHP score</th>";
echo " <th>Java Score</th>";
echo " </tr>";
for ($hang = 0; $hang < 4; $hang++) {
    echo "<tr>";
    for ($cot = 0; $cot < 5; $cot++) {
        echo "<td style=\"width:700px\">".$students[$hang][$cot]."</td>";
    }
    echo " </tr>";
}
echo "</table>";

echo "<h2>a/ Tên có chứa a</h2>";
echo "<table style=\"width:300px\">";
echo "<tr>";
echo " <th>Name</th>";
echo " <th>Class</th>";
echo " <th>CSS class</th>";
echo " <th>PHP score</th>";
echo " <th>Java Score</th>";
echo " </tr>";
for ($hang = 0; $hang < 4; $hang++) {
    if (strpos($students[$hang][0], 'a') !== false) {
        echo "<tr>";
        echo " <td style=\"width:700px\">" . $students[$hang][0] . "</td>";
        echo " <td style=\"width:700px\">" . $students[$hang][1] . "</td>";
        echo " <td style=\"width:700px\">" . $students[$hang][2] . "</td>";
        echo " <td style=\"width:700px\">" . $students[$hang][3] . "</td>";
        echo " <td style=\"width:700px\">" . $students[$hang][4] . "</td>";
        echo " </tr>";
    }
}
echo "</table>";


echo "<h2>b/ Lớp php có điểm css cao nhất</h2>";
echo "<table style=\"width:300px\">";
echo "<tr>";
echo " <th>Name</th>";
echo " <th>Class</th>";
echo " <th>CSS class</th>";
echo " <th>PHP score</th>";
echo " <th>Java Score</th>";
echo " </tr>";
$data = array();
for ($hang = 0; $hang < 4; $hang++) {
    if ($students[$hang][1] === 'PHP_27') {
        array_push($data, $students[$hang][2]);
    }
}
for ($hang = 0; $hang < 4; $hang++) {
    if ($students[$hang][2] == max($data)) {
        echo "<tr>";
        echo " <td style=\"width:700px\">" . $students[$hang][0] . "</td>";
        echo " <td style=\"width:700px\">" . $students[$hang][1] . "</td>";
        echo " <td style=\"width:700px\">" . $students[$hang][2] . "</td>";
        echo " <td style=\"width:700px\">" . $students[$hang][3] . "</td>";
        echo " <td style=\"width:700px\">" . $students[$hang][4] . "</td>";
        echo " </tr>";
    }
}
echo "</table>";



echo "<h2>c/ Tăng dần điểm php</h2>";
echo "<table style=\"width:300px\">";
echo "<tr>";
echo " <th>Name</th>";
echo " <th>Class</th>";
echo " <th>CSS class</th>";
echo " <th>PHP score</th>";
echo " <th>Java Score</th>";
echo " </tr>";
function sortByOrder($a, $b)
{
    return $a['3'] - $b['3'];
}
usort($students, 'sortByOrder');
for ($hang = 0; $hang < 4; $hang++) {
    echo "<tr>";
    echo " <td style=\"width:700px\">" . $students[$hang][0] . "</td>";
    echo " <td style=\"width:700px\">" . $students[$hang][1] . "</td>";
    echo " <td style=\"width:700px\">" . $students[$hang][2] . "</td>";
    echo " <td style=\"width:700px\">" . $students[$hang][3] . "</td>";
    echo " <td style=\"width:700px\">" . $students[$hang][4] . "</td>";
    echo " </tr>";
}
echo "</table>";