<?php
require "libs/rb.php";
R::setup( 'mysql:host=127.0.0.1 ;dbname=registrationForm',
    'root', 'root' );
/*if (!R::testConnection()){
    exit('нет подключения к базе данных');
} else{
    exit("all done");
}*/
session_start();