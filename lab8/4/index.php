<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <title>Document</title>
    <style>
        body {
            font-family: "Noto Sans", "Noto Sans Thai", sans-serif;
        }

        .row {
            display: grid;
            grid-template-columns: auto 50%;
            align-items: center;
            max-width: 500px;
            margin: 20px 0;
        }

        .img {
            text-align: center;
        }

        img {
            width: 80%;
        }
    </style>
</head>

<body>
    <?php
    $url = "http://10.0.15.20/lab8/restapis/10countries";
    $response = file_get_contents($url);
    $result = json_decode($response);

    foreach ($result as $country) {
        echo "<div class='row'>";
        echo "<div>";
        echo "Name : <b>".$country->name."</b><br>";
        echo "Capital : ".$country->capital."<br>";
        echo "Population : ".$country->population."<br>";
        echo "Region : ".$country->region."<br>";
        echo "Location : ".$country->latlng[0]." ".$country->latlng[1]."<br>";
        echo "Borders : ";
        foreach ($country->borders as $border) {
            echo $border." ";
        }
        echo "</div>";
        echo "<div class='img'><img src='".$country->flag."'></div>";
        echo "</div>";
    }
    ?>
</body>

</html>