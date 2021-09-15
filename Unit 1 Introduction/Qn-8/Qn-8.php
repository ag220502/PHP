<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
</head>
<body style="background: <?php echo $_POST['bcolor']; ?>; color: <?php echo $_POST['tcolor']; ?>;">
    <h1 style="text-align: center;"><?php echo $_POST['ptitle']; ?></h1>
    <p style="text-align:center"><?php echo $_POST['content']; ?></p>
</body>
</html>