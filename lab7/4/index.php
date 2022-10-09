<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <title>Document</title>
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        h1 {
            text-align: center;
            color: #656565;
        }

        img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 6px;
            box-shadow: 0em 0.7em 2em #0002;
        }
    </style>
</head>

<body>
    <h1>Poom Gallery 📷</h1>
    <div class="gallery">
        <?php
        $images = array(
            "https://picsum.photos/300/500",
            "https://picsum.photos/500/800",
            "https://picsum.photos/200/300",
            "https://picsum.photos/400/250",
            "https://picsum.photos/300/250",
            "https://picsum.photos/300/350",
            "https://picsum.photos/300/300",
            "https://picsum.photos/300/700",
            "https://picsum.photos/300/100",
            "https://picsum.photos/300/150",
            "https://picsum.photos/300/500?1",
            "https://picsum.photos/500/300?1",
            "https://picsum.photos/200/400?1",
            "https://picsum.photos/400/250?1",
            "https://picsum.photos/300/250?1",
            "https://picsum.photos/300/350?1",
            "https://picsum.photos/300/300?1",
            "https://picsum.photos/300/600?1",
            "https://picsum.photos/350/300?1",
            "https://picsum.photos/300/320?1",
            "https://picsum.photos/300/500?2",
            "https://picsum.photos/500/800?2",
            "https://picsum.photos/200/300?2",
            "https://picsum.photos/400/250?2",
            "https://picsum.photos/300/250?2",
            "https://picsum.photos/300/350?2",
            "https://picsum.photos/300/300?2",
            "https://picsum.photos/300/700?2",
            "https://picsum.photos/300/100?2",
            "https://picsum.photos/300/150?2",
            "https://picsum.photos/300/500?3",
            "https://picsum.photos/500/300?3",
            "https://picsum.photos/200/400?3",
            "https://picsum.photos/400/250?3",
            "https://picsum.photos/300/250?3",
            "https://picsum.photos/300/350?3",
            "https://picsum.photos/300/300?3",
            "https://picsum.photos/300/600?3",
            "https://picsum.photos/350/300?3",
            "https://picsum.photos/300/320?3",
        );
        $col = 4;
        for ($i = 0; $i < $col; $i++) {
        ?>
            <div class="col">
                <?php
                for ($j = 0; $j < count($images) / $col; $j++) {
                ?>
                    <img src="<?php echo $images[$i + ($j * $col)]; ?>" alt="">
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>