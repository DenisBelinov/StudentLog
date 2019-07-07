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
            <form class="login" action="./php/server/registerUser.php" method="post">
                <h1>Регистрация</h1>
                <?php 
                    session_start();
                    if(isset($_SESSION['registerError']) && $_SESSION['registerError']){
                        echo '<label class="error">' . $_SESSION['registerError'] . '</label>';
                        $_SESSION['registerError'] = '';
                    }
                ?>
                <p>
                    <label for="username">Потребителско име</label>
                    <input type="text" name="username" placeholder="напр. belinov" required>
                </p>
                <p>
                    <label for="firstName">Име</label>
                    <input type="text" name="firstName" placeholder="напр. Denis" required>
                </p>
                <p>
                    <label for="lastName">Фамилия</label>
                    <input type="text" name="lastName" placeholder="напр. Belinov" required>
                </p>
                <p>
                    <label for="fn">Факултетен номер</label>
                    <input type="text" name="fn" required>
                </p>
                <p>
                    <label for="speciality">Специалност</label>
                    <input type="text" name="speciality" placeholder="напр. СИ" required>
                </p>
                <p>
                    <label for="year">Курс</label>
                    <input type="text" name="year" required>
                </p>
                <p>
                    <label for="email">Имейл</label>
                    <input type="email" name="email" placeholder="напр. dbelinov@mail.com" required>
                </p>
                <p>
                    <label for="password">Парола</label>
                    <input type="password" name="password" required>
                </p>
                <p>
                    <label for="password2">Потвърди парола</label>
                    <input type="password" name="password2" required>
                </p>

                <button type="submit" class="btn btn-outline-secondary btn-block" name="registerButton">Регистрация</button>
            </form>
        </div>
    </div>
    
</main>
</body>
</html>