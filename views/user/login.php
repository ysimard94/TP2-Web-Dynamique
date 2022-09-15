<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        input{
            display:block;
            margin: 5px;
        }
        span{
            color: red;
        }
    </style>
</head>
<body>
    <main>
        <form action="index.php?module=user&action=auth" method="post" class="create-form">
            <label for="username">
                <p>Courriel</p>
                <input type="email" name="username" required/>
            </label>
            <label for="password">
                <p>Mot de passe</p>
                <input type="password" name="password" required/>
            </label>
            <input type="submit" value="Login" />
        </form>
    </main>
</body>
</html>