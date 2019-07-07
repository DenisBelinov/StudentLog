<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<main>
    <header>
        <nav>
            <a href='index.php'>Начало</a>
            <a href='register.php'>Регистрация</a>
            <a href='login.php'>Вход</a>
        </nav>
    </header>
    <div class="card bg-light">
        <div class="card-body mx-auto" style="max-width: 400px;">
            <form class="login" action="./php/server/loginUser.php" method="post">
                <h3>Вход</h3>
                <?php 
                    session_start();
                    if(isset($_SESSION['loginError']) && $_SESSION['loginError']){
                        echo '<label class="error">' . $_SESSION['loginError'] . '</label>';
                        $_SESSION['loginError'] = '';
                    }
                ?>
                <div class="form-group">
                    <label for="loginUsername">Потребителско име</label>
                    <input id="loginUsername" type="text" name="loginUsername" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Парола</label>
                    <input id="loginPassword" type="password" name="loginPassword" required>
                </div>

                <button type="submit" class="btn btn-block btn-outline-secondary" name="loginButton">Вход</button>
            </form>
        </div>
    </div>
    
</main>
</body>
</html>