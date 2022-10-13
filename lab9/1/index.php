<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <title>Document</title>
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>
    <?php
    // Connect to Database
    class MyDB extends SQLite3
    {
        function __construct()
        {
            $this->open('customers.db');
        }
    }

    // Open Database
    $db = new MyDB();
    if (!$db) {
        echo $db->lastErrorMsg();
    } else {
        // echo "Opened database successfully<br>";
    }

    if (isset($_POST['delete'])) {
        $id = intval($_POST['delval']);
        $sqlDel = "DELETE from customers_original where CustomerId = $id;";
        $rets = $db->exec($sqlDel);
        // if (!$rets) {
        //     echo $db->lastErrorMsg();
        // } else {
        //     echo $db->changes(), " Record deleted successfully<br>";
        // }
    }

    ?>
    <div class="container">
        <h1>Customers</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query process
                $sql = "SELECT * from customers_original";

                $ret = $db->query($sql);
                $last_id = 0;
                while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
                    $last_id = $row['CustomerId'];
                    echo "<tr>";
                    echo "<th scope='row'>" . $row['CustomerId'] . "</th>";
                    echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
                    echo "<td>" . $row['Address'] . "</td>";
                    echo "<td>" . $row['Phone'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <form action="index.php" method="POST">
            <input type="hidden" name="delval" value="<?php echo $last_id ?>">
            <button type="submit" name="delete" class="btn btn-danger">Delete last row (กดลบได้เต็มที่เลยเพื่อนๆ)</button>
        </form>
    </div>
    <?php

    // Close database
    $db->close();

    ?>
</body>

</html>