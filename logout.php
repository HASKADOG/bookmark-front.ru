<?php  
require 'libs/bd.php';

unset($_SESSION['logged_user']);
header('Location: /');