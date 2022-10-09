<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px solid black;
        }

        td {
            width: 50px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php

    if (isset($_POST['inpvalue'])) {
        $number = $_POST['inpvalue'];
    } else $number = 0;
    ?>
    <form action="index.php" method="post">
        กรอกสูตรคูณ:
        <input type="number" id="inpvalue" name="inpvalue" value="<?php echo $number ?>" />
        <input type="submit" id="submit" value="แสดงตาราง">
    </form>
    <h2>ตารางสูตรคูณแม่ <?php echo $number ?></h2>
    <table>
        <?php
        for ($i = 1; $i <= 12; $i++) {
            echo "<tr>";
            echo "<td>$number</td>";
            echo "<td>x</td>";
            echo "<td>$i</td>";
            echo "<td>=</td>";
            echo "<td>" . $number * $i . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>