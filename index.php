<?php
require "db.php";

?>

<?php
if(isset($_SESSION['logged_user'])):  ?>
Авторизован !
<?php else :?>
<br>

<a href="/login.php"> Authorization </a> <br>
<a href="/signup.php"> Registration </a>

<?php endif;?>