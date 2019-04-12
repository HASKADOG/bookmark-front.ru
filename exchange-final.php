<?php 
require 'libs/bd.php';
$data = $_POST;

//RECEPIENT - MAN THAT STARTED THE OFFER

if (isset($data['exchangeLast']))
{
	$donor = R::load('users', $data['donorid']);
	$recepient = R::load('users', $data['recepientid']);
	$donors_book = R::load('books', $data['donorbookid']);
	$recepients_book = R::load('books', $data['recepientbookid']);


	$exchanges = R::dispense('exchanges');

	$exchanges->donor = $donor;
	$exchanges->recepient = $recepient;
	$exchanges->donors_book = $donors_book;
	$exchanges->recepients_book = $recepients_book;
	$exchanges->recepients_name = $recepient->name . ' ' . $recepient->surname;
	$exchanges->donor_name = $donor->name . ' ' . $donor->surname;

	$exchanges->accepted_by_donor = 0;
	$exchanges->accepted_by_recepient = 0;
	$exchanges->is_denied = 0;
	$exchanges->is_finished = 0;
	$exchanges->deleted_by_donor = 0;
	$exchanges->deleted_by_recepient = 0;
	$exchanges->time = time();

	R::store($exchanges);
	header('Location: index.php');

	/*$exchanges = R::dispense('exchanges');

	$exchanges->donor_id = $data['donorid'];
	$exchanges->recepient_id = $data['recepientid'];
	$exchanges->donors_book_id = $data['donorbookid'];
	$exchanges->recepients_book_id = $data['recepientbookid'];

	$exchanges->accepted = '0';
	$exchanges->time = time();

	R::store($exchanges);*/
}

 ?>

