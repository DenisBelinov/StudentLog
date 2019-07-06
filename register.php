<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<main>
    <header>
        <?php
        include_once "./php/utils/nav.html";
        ?>
    </header>
    
    <form action="./php/server/registerUser.php" method="post">
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
        <input type="text" name="username" placeholder="e.g. denko" required>
    </p>
    <p>
        <label for="firstName">Име</label>
        <input type="text" name="firstName" placeholder="e.g. Denis" required>
    </p>
    <p>
        <label for="lastName">Фамилия</label>
        <input type="text" name="lastName" placeholder="e.g. Belinov" required>
    </p>
    <p>
        <label for="fn">Факултетен номер</label>
        <input type="text" name="fn" required>
    </p>
    <p>
        <label for="speciality">Специалност</label>
        <input type="text" name="speciality" placeholder="напр. Софтуерно инженерство" required>
    </p>
    <p>
        <label for="year">Курс</label>
        <input type="text" name="year" required>
    </p>
    <p>
        <label for="email">Имейл</label>
        <input type="email" name="email" placeholder="e.g. dbelinov@mail.com" required>
    </p>
    <p>
        <label for="password">Парола</label>
        <input type="password" name="password" required>
    </p>
    <p>
        <label for="password2">Потвърди парола</label>
        <input type="password" name="password2" required>
    </p>

    <button type="submit" name="registerButton">Регистрация</button>
    </form>
</main>
</body>
</html>