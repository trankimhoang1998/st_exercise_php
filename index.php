<!DOCTYPE html>
<html>
<head>
    <title>exercise-2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php

function numeric($num){
    // will check if is numeric
    $int = $num;
    if(empty($int) or strcmp(preg_replace("/[^0-9,.]/", "", $int), $num) != 0 )
    {
        return false;
    }
    else return true;
}

$error = array();
$data = array();
$result = '';

if (!empty($_POST['cricle_action'])) {
    $data['superficies'] = isset($_POST['superficies']) ? $_POST['superficies'] : '';
    $data['radius'] = isset($_POST['radius']) ? $_POST['radius'] : '';


    if (!empty($data['superficies']) && empty($data['radius']) && numeric($data['superficies'])) {
        $bankinh=sqrt($data['superficies']/pi());
        $result ="bán kính hình tròn là: ".$bankinh;
    }

    if(!numeric($data['superficies']) && $data['superficies']){
        echo 'bạn phải nhập superficies là số<br>';
    }

    if (empty($data['superficies']) && !empty($data['radius']) && numeric($data['radius'])) {
        $dientich=pi()*$data['radius']*$data['radius'];
        $result ="diện tích hình tròn là: ".$dientich;
    }

    if(!numeric($data['radius']) && $data['radius']){
        echo 'bạn phải nhập radius là số<br>';
    }

    if (!empty($data['superficies']) && !empty($data['radius'])) {
        echo "Bạn chỉ được nhập 1 trong 2 trường<br>";
    }

    if (empty($data['superficies']) && empty($data['radius'])) {
        echo "Bạn phải nhập 1 trong 2 trường<br>";
    }
}
?>
<h1>exercise-2</h1>
<form method="post" action="index.php">
    <table cellspacing="0" cellpadding="5">
        <tr>
            <td>Superficies</td>
            <td>
                <input type="text" name="superficies" id="superficies" value="<?php echo isset($data['superficies']) ? $data['superficies'] : ''; ?>" />
            </td>
        </tr>
        <tr>
            <td>Radius</td>
            <td>
                <input type="text" name="radius" id="radius" value="<?php echo isset($data['radius']) ? $data['radius'] : ''; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="cricle_action" value="Submit"/></td>
        </tr>
        <tr>
            <td>Result: </td>
            <td>
                <?php echo isset($result) ? $result : ''; ?>
            </td>
        </tr>
    </table>
</form>
</body>
</html>