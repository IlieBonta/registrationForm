<?php
require "db.php";

$data = $_POST;
if ( isset($data['do_signup']) ) {
// здесь регистрируем
    //проверка на пустоту
    $errors = array();
    if (trim($data['login']) == '')
    {
        $errors[] = 'Please, Enter Login';
    }
    if (trim($data['email']) == '')
    {
        $errors[] = 'Please, Enter Email';
    }
    if ($data['password'] == '')
    {
        $errors[] = 'Please, Enter Password';
    }
    if ($data['password_2'] != $data['password'])
    {
        $errors[] = 'Please, Repeat Your Password';
    }
    if (empty($errors)) {
        //если масив с ошибками пуст то можно регистрировать
        $user = R::dispense('users');
        $user ->login = $data['login'];
        $user->email = $data['email'];
        // шифруем пароль
        $user->password =password_hash($data['password'],PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style="color: green;"> Successful Registration ! </div><hr>';
    } else {
        // если этот масив не пустой то вывожу ошибку первую из масива
        echo '<div style="color: red;">' . array_shift($errors).'</div><hr>';
    }
}
?>

<form action="http://localhost:63342/registrationForm/signup.php" method="post">

    <p>
    <p><strong> Your Login </strong>:</p>
    <input type="text" name="login" value="<?= @$data['login']?>">


    <p>
    <p><strong> Your Email </strong>:</p>
    <input type="email" name="email" value="<?= @$data['email']?>">


    <p>
    <p><strong> Your Password </strong>:</p>
    <input type="password" name="password" value="<?= @$data['password']?>">


    <p>
    <p><strong> Repeat Your Password </strong>:</p>
    <input type="password" name="password_2" value="<?= @$data['password_2']?>">


    <p>
        <button type="submit" name="do_signup"> Register </button>
    </p>

</form>