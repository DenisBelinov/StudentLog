<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<main>
    <form action="./php/server/loginUser.php" method="post">
    <h1>Login</h1>
    <?php 
        session_start();
        if(isset($_SESSION['loginError']) && $_SESSION['loginError']){
            echo '<label class="error">' . $_SESSION['loginError'] . '</label>';
            $_SESSION['loginError'] = '';
        }
    ?>
    <p>
        <label for="loginUsername">Username</label>
        <input id="loginUsername" type="text" name="loginUsername" placeholder="e.g. denko" required>
    </p>
    <p>
        <label for="loginPassword">Password</label>
        <input id="loginPassword" type="password" name="loginPassword" required>
    </p>

    <button type="submit" name="loginButton">Log in</button>
    </form>
</main>
</body>
</html>