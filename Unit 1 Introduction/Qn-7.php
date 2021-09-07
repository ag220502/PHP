<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>About Me</h2>
    <form action="" method="GET">
        <label for="">Time of day: </label>
        <select name="tod" id="tod">
            <option value="Morning">Morning</option>
            <option value="Afternoon">Afternoon</option>
            <option value="Evening">Evening</option>
        </select>
        <br><br>
        <label for="">Name: </label>
        <input type="text" name="sname" id="sname">
        <br><br>
        <label for="">Age: </label>
        <input type="text" name="sage" id="sage">
        <br><br>
        <label for="">University: </label>
        <input type="text" name="suni" id="suni">
        <br><br>
        <label for="">Hobby: </label>
        <input type="text" name="shobby" id="shobby">
        <br><br>
        <label for="">Favourite Book: </label>
        <input type="text" name="sbook" id="sbook">
        <br><br>

        <button type="submit" name="submit">Submit</button> <br><br>
    </form>

    <?php
        if(isset($_GET['submit'])) {
            $tod = $_GET['tod'];
            $name = $_GET['sname'];
            $age = $_GET['sage'];
            $uni = $_GET['suni'];
            $hobby = $_GET['shobby'];
            $book = $_GET['sbook'];

            echo "Good ". $tod.", <br>";
            echo "My name is ". $name .". I am ". $age ." years old. I study at ". $uni .". My hobby is ". $hobby ." and many more. My favourite book is ". $book .".<br>Thank You!";
        }
    ?>
    
</body>
</html>