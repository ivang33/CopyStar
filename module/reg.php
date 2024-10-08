<?php


if (isset($_SESSION['login']['id'])) {
    header('location: index.php');
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = htmlspecialchars($_POST["surname"]);
    $name = htmlspecialchars($_POST["name"]);
    $patronymic = htmlspecialchars($_POST["patronymic"]);
    $email = htmlspecialchars($_POST["email"]);
    $login = htmlspecialchars($_POST["login"]);
    $password = htmlspecialchars($_POST["password"]);
    $password_repeat = htmlspecialchars($_POST["password_repeat"]);

    if ($password != $password_repeat) {
        $error = "Пароли не совпадают!";
    } else {

        $sql_check = "SELECT * FROM 'users' WHERE 'login' = '$login' OR 'email' = '$email'";
        $result = $conn->query($sql_check);
        if ($result->rowCount()) {
            $error = "Пользователя с таким логином и почтой уже существует";
        } else{
            $sql = "SELECT 'id' FROM 'roles' WHERE 'code' = 'client'";
            $result = $conn->query($sql);
            $role_id = $result->fetchColumn('id');

            $sql = "INSERT INTO `users` (`id`, `surname`, `name` , `patronymic`, `email`, `login`, `password`, `role_id`)
            VALUES (NULL, '$surname', '$name', '$patronymic', '$email', '$login', '$password', '$role_id')";
            $conn->query($sql);

            $sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
            $result = $conn->query($sql);
            if ($result->rowCount()) {
                $row = $result->fetch();
                $_SESSION['login'] = $login;
                header('location: index.php');
            }
        }
    }
}

?>
<section class="p-4 d-flex flex-column gap-3">
    <h2>Авторизация</h2>
    <?= isset($error) ? '<p class="alert alert-danger">'.$error. '</p>' : null ?>
    <form class="d-flex flex-column gap-3" action="index.php?page=login" method="post">
        <input class="form-control" type="text" name="name" placeholder="Имя" required>
        <input class="form-control" type="text" name="surname" placeholder="Фамилия" required>
        <input class="form-control" type="text" name="login" placeholder="Отчество" required>
        <input class="form-control" type="email" name="email" placeholder="Email" required>
        <input class="form-control" type="text" name="login" placeholder="Логин" required>
        <input class="form-control" type="password" name="password" placeholder="Пароль" required>
        <input class="form-control" type="password" name="password_repeat" placeholder="Проверка пороля" required>
        <label><input type="checkbox" required>Я ознакомлен с <a href="#">правилами сайта</a></label>
        <button class="btn btn-dark" type="submit">Вход</button>
    </form>
</section>


