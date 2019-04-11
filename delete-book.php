<?php 
require 'libs/bd.php';

$errors = array();
$data = $_POST;

if (isset($_SESSION['logged_user']))
	{
		$book = R::load('books', $_GET['book_id']);//
	} else {
		header("Location: login.php");
	}

if ($book->users_id == $_SESSION['logged_user']->id)
{
	R::trash( $book );
	header("Location: profile.php");
} else {
	$errors[] = "Эта книга вам не принадлежит! Положите на место!!!";
}