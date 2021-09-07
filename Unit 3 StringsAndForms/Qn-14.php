<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 3</title>
</head>
<body>
    <h1>Form</h1>
    <form action="" method="POST">
        <label for="">Enter first name: </label>
        <input type="text" name="fname" id="fname">
        <br><br>
        <label for="">Enter last name: </label>
        <input type="text" name="lname" id="lname">
        <br><br>
        <button type="submit" name="namecheck">Check</button>
        <br><br>
    </form>

    <?php
        if (isset($_POST['namecheck'])) {
            echo "<script>
                            var letters = /^[A-Za-z]+$/;
                            var fname = document.getElementById('fname').value;
                            var lname = document.getElementById('lname').value;
                            if(!letters.test(fname) && !letters.test(lname)) {
                                alert('Please enter valid name');
                            }
                            else {
                                alert('Validation successful');
                            }
                        </script>";
        }
    ?>
</body>
</html>