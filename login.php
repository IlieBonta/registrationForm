<?php
require "db.php";

$data = $_POST;

if (isset($data['do_login'])) {
    $errors = array();
    $user = R::findOne('user', 'login = ?', array($data['login']));

    if ($user) {
        //логин сушествует
        if (password_verify($data['password'], $user->password)) {
        //запоминаем пользователя
           $_SESSION['logged_user'] = $user;
            echo '<div style="color: green;"> Successful  ! </div><hr>';

        } else {
            $errors[] = 'Неверно введен пароль';
        }
    } else {
        $errors[] = 'Пользователь с таким логином не найден';
    }
    if (!empty($errors)) {
        echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }
}
?>

<form action="http://localhost:63342/login.php" method="POST">

    <p><strong> Your Login </strong>:</p>
    <input type="text" name="login" value="<?= @$data['login'] ?>">

    <p><strong> Your Password </strong>:</p>
    <input type="password" name="password" value="<?= @$data['password'] ?>">

    <p>
        <button type="submit" name="do_login"> Login</button>
    </p>

</form>
