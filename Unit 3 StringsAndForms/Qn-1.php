<!DOCTYPE html>
<html lang="en">
<head>
    <title>Unit 2</title>
</head>
<body>
    <h1>Enter Details</h1>
    <form action="" method="GET">
        <label for="">Nickname: </label>
        <input type="text" name="nname" id="nname">
        <br><br>
        <label for="">First Name: </label>
        <input type="text" name="fname" id="fname">
        <br><br>
        <label for="">Memo: </label><br>
        <textarea name="memo" id="memo" cols="30" rows="6"></textarea>
        <br><br>
        <button type="submit" name="fsub">Submit</button>
        <br><br>
    </form>
    
    <?php
        if (isset($_GET['fsub'])) {
            $nname = $_GET['nname'];
            $fname = $_GET['fname'];
            $memo = $_GET['memo'];

            echo "<p>
                    Full Name: ".$fname."<br>
                    Nick Name: ".$nname."<br>
                    Memo: ".$memo."
                  </p>";
        }
    ?>
</body>
</html>