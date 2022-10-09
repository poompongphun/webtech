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
    if (isset($_POST['fromcur']) && isset($_POST['fromval'])) {
        $url = "http://10.0.15.20/lab8/restapis/currencyrate";
        $response = file_get_contents($url);
        $result = json_decode($response);
    }
    ?>
    <h1>Currency Converter</h1>
    <form method="POST" action="index.php">
        <div>
            From:
            <select name="fromcur">
                <option value="THB" <?php if (isset($_POST['fromcur']) && $_POST["fromcur"] == "THB") {
                                        echo "selected";
                                    } ?>>THB</option>
                <option value="JPY" <?php if (isset($_POST['fromcur']) && $_POST["fromcur"] == "JPY") {
                                        echo "selected";
                                    } ?>>
                    JPY
                </option>
                <option value="CNY" <?php if (isset($_POST['fromcur']) && $_POST["fromcur"] == "CNY") {
                                        echo "selected";
                                    } ?>>
                    CNY
                </option>
                <option value="SGD" <?php if (isset($_POST['fromcur']) && $_POST["fromcur"] == "SGD") {
                                        echo "selected";
                                    } ?>>
                    SGD
                </option>
                <option value="USD" <?php if (isset($_POST['fromcur']) && $_POST["fromcur"] == "USD") {
                                        echo "selected";
                                    } ?>>
                    USD
                </option>
            </select>
            <input type="number" name="fromval" value="<?php if (isset($_POST['fromval'])) {
                                                            echo $_POST['fromval'];
                                                        }  ?>" />
        </div>
        <div>
            To:
            <select name="tocur">
                <option value="THB" <?php if (isset($_POST['tocur']) && $_POST["tocur"] == "THB") {
                                        echo "selected";
                                    } ?>>THB</option>
                <option value="JPY" <?php if (isset($_POST['tocur']) && $_POST["tocur"] == "JPY") {
                                        echo "selected";
                                    } ?>>
                    JPY
                </option>
                <option value="CNY" <?php if (isset($_POST['tocur']) && $_POST["tocur"] == "CNY") {
                                        echo "selected";
                                    } ?>>
                    CNY
                </option>
                <option value="SGD" <?php if (isset($_POST['tocur']) && $_POST["tocur"] == "SGD") {
                                        echo "selected";
                                    } ?>>
                    SGD
                </option>
                <option value="USD" <?php if (isset($_POST['tocur']) && $_POST["tocur"] == "USD") {
                                        echo "selected";
                                    } ?>>
                    USD
                </option>
            </select>
            <input type="number" name="fromto" disabled value="<?php if (isset($_POST['fromcur']) && isset($_POST['fromval'])) {
                                                                    echo (floatval($_POST['fromval'] / $result->rates->{$_POST['fromcur']})) * $result->rates->{$_POST['tocur']};
                                                                } ?>" />
        </div>
        <button type="submit" name="submit">Convert</button>
    </form>
</body>

</html>