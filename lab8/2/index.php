<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php
    $day = rand(1, 30);
    if ($day <= 9) {
        $date = "2022-09-0" . $day;
    } else {
        $date = "2022-09-" . $day;
    }
    ?>
    <div class="container">
        <h1>Covid date: <?php echo $date; ?></h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">จังหวัด</th>
                    <th scope="col">ผู้ติดเชื้อ</th>
                    <th scope="col">เสียชีวิต</th>
                    <th scope="col">ยอดผู้ป่วยสะสม</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $url = "https://covid19.ddc.moph.go.th/api/Cases/timeline-cases-by-provinces";
                $response = file_get_contents($url);
                $result = json_decode($response);

                $index = 1;
                foreach ($result as $covid) {
                    if ($covid->txn_date == $date) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $index . "</td>";
                        echo "<td>" . $covid->province . "</td>";
                        echo "<td>" . $covid->new_case_excludeabroad . "</td>";
                        echo "<td>" . $covid->new_death . "</td>";
                        echo "<td>" . $covid->total_case_excludeabroad . "</td>";
                        echo "</tr>";
                        $index++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>