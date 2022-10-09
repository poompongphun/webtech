<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (
        isset($_POST['name']) && strlen($_POST['name']) >= 5
        && isset($_POST['address']) && strlen($_POST['address']) >= 5
        && isset($_POST['age']) && $_POST['age'] != '0'
        && isset($_POST['profession']) && strlen($_POST['profession']) >= 5
    ) {
        echo "Name: " . $_POST['name'];
        echo "<br>";
        echo "Address: " . $_POST['address'];
        echo "<br>";
        echo "Age: " . $_POST['age'];
        echo "<br>";
        echo "Profession: " . $_POST['profession'];
        echo "<br>";
        echo "Residence: " . $_POST['residential_status'];
    } else {
    ?>
        <h1>Member Registration</h1>
        <form action="index.php" method="post">
            <div>
                <div>
                    <label for="name">Name:</label>
                </div>
                <input type="text" id="name" name="name" value="<?php if (isset($_POST['name'])) echo $_POST['name'] ?>">
                <?php
                if (isset($_POST['name']) && strlen($_POST['name']) < 5) {
                    echo "<div style='color: red;'>Name must be at least 5 characters</div>";
                }
                ?>
            </div>
            <div>
                <div>
                    <label for="address">Address:</label>
                </div>
                <textarea id="address" name="address" rows="10" cols="50" value=""><?php if (isset($_POST['address'])) echo $_POST['address'] ?></textarea>
                <?php
                if (isset($_POST['address']) && strlen($_POST['address']) < 5) {
                    echo "<div style='color: red;'>Address must be at least 5 characters</div>";
                }
                ?>
            </div>
            <div>
                <div>
                    <label for="age">Age:</label>
                </div>
                <input type="number" id="age" name="age" value="<?php if (isset($_POST['age'])) echo $_POST['age'];
                                                                else echo 0 ?>">
                <?php
                if (isset($_POST['age']) && $_POST['age'] == '0') {
                    echo "<div style='color: red;'>Age must be greater than 0</div>";
                }
                ?>
            </div>
            <div>
                <div>
                    <label for="profession">Profession:</label>
                </div>
                <input type="text" id="profession" name="profession" value="<?php if (isset($_POST['profession'])) echo $_POST['profession'] ?>">
                <?php
                if (isset($_POST['profession']) && strlen($_POST['profession']) < 5) {
                    echo "<div style='color: red;'>Profession must be at least 5 characters</div>";
                }
                ?>
            </div>
            <div>
                <div>
                    <label for="resident">Residential status:</label>
                </div>
                <input type="radio" id="resident" name="residential_status" value="resident" checked>
                <label for="resident">Resident</label>
                <input type="radio" id="nonresident" name="residential_status" value="nonresident">
                <label for="nonresident">Non-Resident</label>
            </div>
            <button type="submit">Submit</button>
        </form>
    <?php
    }
    ?>
</body>

</html>