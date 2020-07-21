<!DOCTYPE html>
<html>
<head>
    <title>exercise-3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
$error = array();
$data = array();
$result = '';

if (!empty($_POST['replace_action'])) {
    $data['inputs'] = isset($_POST['inputs']) ? $_POST['inputs'] : '';
    $data['find'] = isset($_POST['find']) ? $_POST['find'] : '';
    $data['replace'] = isset($_POST['replace']) ? $_POST['replace'] : '';

    if (empty($data['inputs']) or empty($data['find']) or empty($data['replace'])) {
        $error['empty'] = 'Bạn phải nhập đầu đủ 3 trường';
    }else{
        if (stripos($data['inputs'], $data['find']) !== false) {
            if (!empty($data['inputs']) && !empty($data['find']) && !empty($data['replace'])) {
                $result =str_replace($data['find'],$data['replace'],$data['inputs']);
            }
        }else{
            $error['find'] = 'Không tìm thấy chuỗi find';
        }
    }

    if (!empty($data['inputs']) && !empty($data['find']) && !empty($data['replace'])) {
        $result =str_ireplace($data['find'],$data['replace'],$data['inputs']);
    }

}
?>
<h1>REPLACE STRING</h1>
<form method="post" action="index.php">
    <table cellspacing="0" cellpadding="5">
        <tr>
            <td>Input</td>
            <td>
                <input type="text" name="inputs" id="inputs" value="<?php echo isset($data['inputs']) ? $data['inputs'] : ''; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Find</td>
            <td>
                <input type="text" name="find" id="find" value="<?php echo isset($data['find']) ? $data['find'] : ''; ?>"/>
            </td>
            <td>replace</td>
            <td>
                <input type="text" name="replace" id="replace" value="<?php echo isset($data['replace']) ? $data['replace'] : ''; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Result</td>
            <td>
                <input type="text" name="result" id="result" value="<?php echo isset($result) ? $result : ''; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="replace_action" value="Submit"/></td>
            <td><?php echo isset($error['empty']) ? $error['empty'] : ''; ?></td>
            <td><?php echo isset($error['find']) ? $error['find'] : ''; ?></td>
        </tr>
    </table>
</form>
</body>
</html>