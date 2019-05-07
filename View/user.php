<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <div> Connected as <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></div>
        <div> <a href="View/disconnect.php">Disconnect</a> </div>
    </header>
    <div class="program">
        <fieldset>
            <legend>My programs</legend>
        </fieldset>
    </div>
</body>
</html>