<?php 
	require 'libs/bd.php';
	$data = $_POST;
	$exchange = R::load('exchanges', $data['exchangeid']);
	//who is
					
	//who is
//canceling
	if (isset($data['cancel_order']))
	{
		$exchange->is_denied = 1;
		R::store($exchange);
		header('Location: exchange-accept.php');
	}
//canceling
//deleting
	if (isset($data['delete_order'])) {
		if ($_SESSION['logged_user']->id == $exchange['donor_id'])
		{
			//deleting offer from donor's page
			$exchange->deleted_by_donor = 1;
			R::store($exchange);
			header('Location: exchange-accept.php');
		} elseif ($_SESSION['logged_user']->id == $exchange['recepient_id']) 
		{ 
			//deleting offer from recepient's page
			$exchange->deleted_by_recepient = 1;
			R::store($exchange);
			header('Location: exchange-accept.php');
		}
	}	
//deleting



	if (isset($data['operate'])) {
	

		if ($_SESSION['logged_user']->id == $exchange['donor_id'])
		{
			if ($exchange['accepted_by_donor'] == 0)
			{	
				$exchange->accepted_by_donor = 1;
				R::store($exchange); 
				header('Location: exchange-accept.php');
			} elseif ($exchange['accepted_by_donor'] == 1) {
				$exchange->accepted_by_donor = 2;
				R::store($exchange); 
				header('Location: exchange-accept.php');
			}
		}

		if ($_SESSION['logged_user']->id == $exchange['recepient_id'])
		{
			$exchange->accepted_by_recepient = 1;
			$exchange->is_finished = 1;
			R::store($exchange);
			header('Location: exchange-accept.php');
			//book transfering
				$donor = R::load('users', $exchange['donor_id']); //Darina
				$recepient = R::load('users', $exchange['recepient_id']); //Me
			
				$donor_book = R::load('books', $exchange['donors_book_id']);
				$recepient_book = R::load('books', $exchange['recepients_book_id']);
	
				// unset($donor->ownBooksList[$exchange['donors_book_id']]);
				
				// unset($recepient->ownBooksList[$exchange['recepients_book_id']]);
	
				$recepient->ownBooksList[] = $donor_book;
				$donor->ownBooksList[] = $recepient_book;
	
				R::store($donor);
				R::store($recepient);
				header('Location: exchange-accept.php');
			//book transfering
		}
	}
 ?>
