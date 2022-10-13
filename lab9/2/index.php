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
            $this->open('employees.db');
        }
    }

    // Open Database
    $db = new MyDB();
    if (!$db) {
        echo $db->lastErrorMsg();
    } else {
        // echo "Opened database successfully<br>";
    }

    // Query process
    // $sql = <<<EOF
    //         CREATE TABLE EMPLOYEES
    //         (ID INT PRIMARY KEY     NOT NULL,
    //         NAME           TEXT    NOT NULL,
    //         AGE            INT     NOT NULL,
    //         ADDRESS        CHAR(50),
    //         SALARY         REAL);
    //       EOF;

    // $ret = $db->exec($sql);
    // if (!$ret) {
    //     echo $db->lastErrorMsg();
    // } else {
    //     echo "Table created successfully<br>";
    // }
    if (isset($_POST['id'])) {
        $id = intval($_POST['id']);
        $name = $_POST['name'];
        $age = intval($_POST['age']);
        $address = $_POST['address'];
        $salary = floatval($_POST['salary']);

        $sql = <<<EOF
        INSERT INTO employees (ID,NAME,AGE,ADDRESS,SALARY)
        VALUES ($id, '$name', $age, '$address', $salary );
    EOF;

        $ret = $db->exec($sql);
        if (!$ret) {
            echo $db->lastErrorMsg();
        } else {
            // echo "Records created successfully<br>";
        }
    }

    ?>
    <div class="container">
        <h1>Employee Form</h1>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="id" class="form-label">Id</label>
                <input type="number" class="form-control" id="id" name="id">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div>
            <h1>List of Employees</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Address</th>
                        <th scope="col">Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query process
                    $sqls = "SELECT * from employees";

                    $rets = $db->query($sqls);
                    while ($row = $rets->fetchArray(SQLITE3_ASSOC)) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row['ID'] . "</th>";
                        echo "<td>" . $row['NAME'] . "</td>";
                        echo "<td>" . $row['AGE'] . "</td>";
                        echo "<td>" . $row['ADDRESS'] . "</td>";
                        echo "<td>" . $row['SALARY'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
        </div>
    </div>
    <?php

    // Close database
    $db->close();

    ?>
</body>

</html>