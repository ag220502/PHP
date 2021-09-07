<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 3</title>
</head>
<body>
    <h1>Form</h1>
    <form action="" method="POST">
        <label for="">Enter registration no.: </label>
        <input type="text" name="regno" id="regno">
        <br><br>
        <button type="submit" name="numcheck">Check</button>
        <br><br>
    </form>

    <?php
        if (isset($_POST['numcheck'])) {
            $num = $_POST['regno'];
            if (is_numeric($num)) {
                echo "Submitted";
            }
            else {
                echo "Please enter a number";
            }
        }
    ?>
</body>
</html>