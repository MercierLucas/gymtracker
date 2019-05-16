<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="View/css/home.css">
    <title>Document</title>
</head>
<body>
    <fieldset id="centerbox">
        <legend>Register</legend>
        <form action="" method="post">
            <table>
                <tr>
                    <td> Firstname </td>
                    <td> <input type="text" name="firstname" required></td>
                </tr>
                <tr>
                    <td> Lastname </td>
                    <td> <input type="text" name="lastname" required></td>
                </tr>
                <tr>
                    <td>Mail</td>
                    <td><input type="text" name="mail" required></td>
                </tr>
                <tr>
                    <td>Confirm mail</td>
                    <td><input type="text" name="remail" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Confirm password</td>
                    <td><input type="password" name="repassword" required></td>
                </tr>
            </table>
            <input type="submit">
            <a href="/gymtracker/?cible=sport&function=login">Login</a>
            <a href="/gymtracker/?cible=sport&function=home">Home</a>
        </form>
        <?php if(isset($error)) echo '<div style="background-color:red;text-align:center;">'.$error.'</div>';?>

    </fieldset>
    
</body>
</html>