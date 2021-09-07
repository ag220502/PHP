<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 2</title>
</head>
<body>
    <h1>Enter Details</h1>
    <form action="" method="GET">
        <label for="">Username: </label>
        <input type="text" name="name" id="name">
        <br><br>
        <button type="submit" name="fsave">Submit</button>
        <br><br>
    </form>
    
    <?php
        if (isset($_GET['fsave'])) {
            $name = $_GET['name'];

            echo "<p>
                    Username: ".$name."<br>
                  </p>";
        }
    ?>
</body>
</html>