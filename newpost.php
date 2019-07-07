<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
<main>
    <header>
        <?php
        include_once "./php/utils/nav.html";
        ?>
    </header>
    
    <form action="./php/server/newPost.php" method="post">
    <h1>Нов пост</h1>
    <?php 
        session_start();
        if(isset($_SESSION['newPostError']) && $_SESSION['newPostError']){
            echo '<label class="error">' . $_SESSION['newPostError'] . '</label>';
            $_SESSION['newPostError'] = '';
        }
    ?>
    <p>
        <label for="title">Заглавие</label>
        <input id="title" type="text" name="title" required>
    </p>
    <p>
        <label for="subject">Предмет</label>
        <input id="subject" type="text" name="subject" required>
    </p>
    <p>
        <label for="type">Тип</label>
        <input id="type" type="text" name="type" required>
    </p>
    <p>
        <label for="comment">Допълнителни коментари</label>
        <input id="comment" type="text" name="comment">
    </p>
    <button type="submit" name="newPostButton">Публикувай</button>
    </form>
</main>
</body>
</html>