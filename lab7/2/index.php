<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            border: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .calender {
            text-align: center;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid rgb(201, 201, 201);
        }

        th,
        td {
            padding: 10px;
        }
    </style>
</head>

<body>
    <table class="calender">
        <tr>
            <th colspan="7">64070067: July</th>
        </tr>
        <tr>
            <th>Sun</th>
            <th>Mo</th>
            <th>Tu</th>
            <th>Wed</th>
            <th>Thr</th>
            <th>Fri</th>
            <th>Sat</th>
        </tr>
        <?php
        $day = 1;
        for ($i = 0; $i < 6; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 7; $j++) {
                if ($i == 0 && $j < 5 || $day > 31) {
                    echo "<td></td>";
                } else {
                    echo "<td>$day</td>";
                    $day++;
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>