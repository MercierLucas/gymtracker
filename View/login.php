<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="View/css/home.css">
    <title>Login</title>
</head>
<body>
    <fieldset id="centerbox">
        <legend>Connexion</legend>
        <form action="" method="post">
            <table>
                <tr>
                    <td> Mail </td>
                    <td> <input type="text" name="mail" required></td>
                </tr>
                <tr>
                    <td> Password </td>
                    <td> <input type="password" name="password" required></td>
                </tr>
            </table>
            <input type="submit" value="Connect">
            <a href="/gymtracker/?cible=sport&function=register">Register</a>
            <a href="/gymtracker/?cible=sport&function=home">Home</a>
        </form>
        <?php if(isset($error)) echo '<div style="background-color:red;text-align:center;">'.$error.'</div>';?>

    </fieldset>
    
</body>
</html>