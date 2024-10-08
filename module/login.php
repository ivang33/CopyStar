<?php
if(isset($_SESSION['login']['id'])){
    header('location: index.php');
}


if (isset($_POST['login']) && !empty($_POST['login']) && !isset($_POST['password']) && !empty($_POST['password'])) {

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

   $sql = "SELECT * FROM `users` WHERE `login` = $login AND `password` = '$password'";
   $result = $conn->query($sql);
    if ($result->rowCount()){
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['login'] = $row;
    header('Location: index.php');
    }
    $error = "Неправильные данные Х_х!";
}

?>
<section class="p-4 d-flex flex-column gap-3">
    <h2>Авторизация</h2>
    <?= isset($error) ? $error : "" ?>
    <form class="d-flex flex-column gap-3" action="index.php?page=login" method="post">
        <input class="form-control" type="text" name="login" placeholder="Введите логин" required>
        <input class="form-control" type="password" name="password" placeholder="Введите пороль" required>
        <button class="btn btn-dark" type="submit">Вход</button>
    </form>
</section>


