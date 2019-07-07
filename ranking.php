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
        <?php
        include_once "./php/utils/nav.html";
        ?>
    </header>
    <section>
    <form id="filterForm">
    <p>
        <label for="typeFilter">Filter by type: </label>
        <input id="typeFilter" type="text" name="typeFilter" placeholder="e.g. denko">
    </p>
    <p>
        <label for="subjectFilter">Filter by subject</label>
        <input id="subjectFilter" type="text" name="subjectFilter">
    </p>

    <button type="submit" name="filterButton">Филтрирай</button>
    </form>
    <button type="button" id="clearButton">Изчисти</button>
    </section>
    
    <section id="rankingPostsContainer">
    </section>
    <script type="text/javascript" src="js/ranking.js"></script>
</body>
</html>