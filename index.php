<!doctype html>

<html>

<head>

    <meta charset="utf-8">

    <title>PHP Calculator</title>

    <style>

        body{
            width: 500px;
            margin: 0 auto;
        }
        input{
            margin-bottom: 10px;
        }
        select{
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<?php

class Calc
{

    public $num1;
    public $num2;
    public $cal;

    public function __construct($num1Inserted, $num2Inserted, $calInserted)
    {
        $this->num1 = $num1Inserted;
        $this->num2 = $num2Inserted;
        $this->cal = $calInserted;
    }

    public function calcMethod()
    {
        switch ($this->cal) {
            case 'add':
                $result = $this->num1 + $this->num2;
                break;
            case 'sub':
                $result = $this->num1 - $this->num2;
                break;
            case 'mul':
                $result = $this->num1 * $this->num2;
                break;
            case 'dev':
                $result = $this->num1 / $this->num2;
                break;
            default:
                $result = "Error";
                break;
        }
        return $result;
    }
}

function numeric($num)
{
    $int = $num;
    if (empty($int) or strcmp(preg_replace("/[^0-9,.,-]/", "", $int), $num) != 0) {
        return false;

    } else {
        return true;
    }
}

$error = array();
$data = array();

if (!empty($_POST['calc_action'])) {
    $data['num1Inserted'] = isset($_POST['num1Inserted']) ? $_POST['num1Inserted'] : '';
    $data['num2Inserted'] = isset($_POST['num2Inserted']) ? $_POST['num2Inserted'] : '';
    $data['calInserted'] = isset($_POST['calInserted']) ? $_POST['calInserted'] : '';


    if (!empty($data['num1Inserted']) && !empty($data['num2Inserted']) && numeric($data['num1Inserted']) && numeric($data['num2Inserted']) ) {
        $calculator = new Calc($data['num1Inserted'], $data['num2Inserted'], $data['calInserted']);
        $result=$calculator->calcMethod();
    }

    if(!numeric($data['num1Inserted']) && $data['num1Inserted']){
        $error['num1Inserted'] = 'Bạn phải nhập First Number là số';
    }

    if(!numeric($data['num2Inserted']) && $data['num2Inserted']){
        $error['num2Inserted'] = 'Bạn phải nhập Second Number là số';
    }

    if (empty($data['num1Inserted']) or empty($data['num2Inserted'])) {
        $error['empty'] = 'Bạn phải nhập đầu đủ 2 trường';
    }
}
?>


<h2>OOP calculator</h2>
<br>
<form action="index.php" method="POST">
    <Lable>First Number</Lable>
    <input type="text" name="num1Inserted" value="<?php echo isset($data['num1Inserted']) ? $data['num1Inserted'] : ''; ?>"/>
    <?php echo isset($error['num1Inserted']) ? $error['num1Inserted'] : ''; ?>
    <br>

    <Lable>Second Number</Lable>
    <input type="text" name="num2Inserted" value="<?php echo isset($data['num2Inserted']) ? $data['num2Inserted'] : ''; ?>">
    <?php echo isset($error['num2Inserted']) ? $error['num2Inserted'] : ''; ?>
    <br>

    <Lable>Oparation</Lable>
    <select name="calInserted">
        <option value="add">+</option>
        <option value="sub">-</option>
        <option value="mul">*</option>
        <option value="dev">/</option>
    </select>
    <br>

    <input type="submit" name="calc_action" value="Submit"/>
    <?php echo isset($error['empty']) ? $error['empty'] : ''; ?>
    <br>
    <Lable>Result:</Lable> <?php echo isset($result) ? $result : ''; ?>
</form>


</body>

</html>