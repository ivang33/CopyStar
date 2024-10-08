<?php
include_once 'module/config.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Copy_Star Shop</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<header>
    <nav class="d-flex justify-content-around">
        <ul class="nav">
            <li><a class="nav nav-link" href="index.php?page=home">О нас</a></li>
            <li><a class="nav nav-link"  href="index.php?page=products">Каталог</a></li>
            <li><a class="nav nav-link"  href="index.php?page=contacts">Где нас найти?</a></li>
        </ul>
        <ul class="nav">
            <?php if (isset($_SESSION['login']['id'])){
            ?><li><a class="nav nav-link" href="index.php?page=logout">Выход</a></li>

            <?php
            } else {
                ?>
            <li><a class="nav nav-link" href="index.php?page=login">Вход</a></li>
                <li><a class="nav nav-link" href="index.php?page=reg">Регистрация</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
</header>
<main>
    <?php
    include_once 'module/route.php';
    ?>
</main>
<footer>
Тут подвал сайта
</footer>
</body>

</html>

