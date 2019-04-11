<?php 
require 'libs/rb.php';
R::setup( 'mysql:host=127.0.0.1;dbname=book',
        'mysql', 'mysql' );
session_start();