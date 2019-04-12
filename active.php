<?php 
require 'libs/bd.php';

$active_exc = R::getAll('select * from `exchanges` where `donor_id`= ? or `recepient_id` = ?', array($_SESSION['logged_user']['id'], $_SESSION['logged_user']['id']));
print_r($active_exc);
/*$donor = R::load('users', $data['donorid']);
$recepient = R::load('users', $data['recepientid']);
$donors_book = R::load('books', $data['donorbookid']);
$recepients_book = R::load('books', $data['recepientbookid']);*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $_SESSION['logged_user']->name . ' ' . $_SESSION['logged_user']->surname; ?></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/profile.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<?php 
			

				$number = 0;
				foreach ($active_exc as $exchanges)
				{ 
					//who is
					// if ($_SESSION['logged_user']->id == $exchanges['donor_id']) {
					// 	$is_donor = true;
					// } elseif ($_SESSION['logged_user']->id == $exchanges['recepient_id']) {
					// 	$is_recepient = true;
					// }
					//who is

					//don't show if offer have been deleted
					if (($_SESSION['logged_user']->id == $exchanges['donor_id']) && ($exchanges['deleted_by_donor'] == 1))
					{
						continue;
					}

					if (($_SESSION['logged_user']->id == $exchanges['recepient_id']) && ($exchanges['deleted_by_recepient']))
					{
						continue;
					}
					//don't show if offer have been deleted


					echo '<table>';	
					$number += 1;

					//db_connection
						$exc_donors_book = R::load('books', $exchanges['donors_book_id']);
						$exc_recepients_book = R::load('books', $exchanges['recepients_book_id']);
					//db_connection

					//delete checking
					
					//delete checking

					//book image	
						if ($exc_donors_book->books_img == '') {
							$img_path = 'img/site_images/not_found.png';
						} else {
							$img_path = $exc_donors_book->books_img;
						} 

						if ($exc_recepients_book->books_img == '') 
						{
							$img_path_d = 'img/site_images/not_found.png';
						} else {
							$img_path_d = $exc_recepients_book->books_img;
						}
					//book image

					//operate button code
						
					//operate button code

					//cancel button code
						$cancel_button = '';

						if (($_SESSION['logged_user']->id == $exchanges['donor_id']) && ($exchanges['is_denied'] == 0)) {
							$cancel_button = '<button type="submit" name="cancel_order">Отклонить запрос</button>';
						} 
						if ($exchanges['accepted_by_donor'] > 0) {
							$cancel_button = '';
						}
					//cancel button code

					//delete button code
						$delete_button = '';
						if (($exchanges['is_denied'] == 1) || ($exchanges['is_finished'] > 0)) {
							$delete_button = '<button type="submit" name="delete_order">Удалить запрос</button>';
						}
					//delete button code

					$is_disable = '';

					//status

					if (($exchanges['is_denied'] > 0))
					{
						$status = 'Обмен отклонён'; 
						$is_disable = 'disabled';
						$button_content = 'Обмнен отклонен';
					} 
					else 
					{ 
						if (($exchanges['accepted_by_donor'] == 0) && ($exchanges['accepted_by_recepient'] == 0)) //начальный этап
						{	$status = 'Ожидает согласия';
							if ($_SESSION['logged_user']->id == $exchanges['donor_id']) //if user is donor
								{
									$button_content = 'Я согласен';
								} elseif ($_SESSION['logged_user']->id == $exchanges['recepient_id']) {
									$status = 'Ожидает согласия';
									$is_disable = 'disabled';
									$button_content = $status;
								}
						} elseif (($exchanges['accepted_by_donor'] == 1) && ($exchanges['accepted_by_recepient'] == 0)) 
									/*донор согласился на обмен, но не подтвердил отдачу*/
							{
								if ($_SESSION['logged_user']->id == $exchanges['donor_id']) //if user is donor
								{
									$status = 'Ожидает подтверждения передачи';
									$button_content = 'Я передал книгу';
								} elseif ($_SESSION['logged_user']->id == $exchanges['recepient_id']) {
									$status = 'Ожидает подтвеждения получения';
									$button_content = 'Я получил книгу';
								}
							} elseif (($exchanges['accepted_by_donor'] == 2) && ($exchanges['accepted_by_recepient'] == 0)) {
								$status = 'Ожидает подтвеждения получения';
								if ($_SESSION['logged_user']->id == $exchanges['donor_id']) {
									$button_content = $status;
									$is_disable = 'disabled';
								} else {
								$button_content = 'Я получил книгу';}
							} elseif ($exchanges['is_finished'] > 0) {
								$status = 'Обмен успешно завершён';
								$button_content = 'Я получил книгу';
								$is_disable = 'disabled';
							} 
					}


						$operate_button = '<button type="submit" name="operate"'. $is_disable .'>'. $button_content .'</button>';
						if ($exchanges['is_finished'] > 0)
						{
							$operate_button = '';
						}

					//status

					//Button content and disabling

					if ($_SESSION['logged_user']->id == $exchanges['donor_id'])
					{

					}
					
					//Button content and disabling

					if ($_SESSION['logged_user']->id == $exchanges['donor_id']) 
					{
						$firsr_row = 'Запрошенная у вас книга';
						$sec_row = 'Предложенная вам книга';
					} else {
						$firsr_row = 'Запрошенная вами книга';
						$sec_row = 'Предложенная вами книга';
					}

					echo '
						<div class="container-fluid exchange">
						<div class="row justify-content-center">
					<div class="col-11 d-flex flex-row align-items-center">
						<div class="owner">'.$exchanges['donor_name'].'</div>
						<div class="owner-wrapper"><img src="'.$img_path.'" width="50px" alt=""></div>
						<div class="owners-book-name">'.$exc_donors_book->book_name.'</div>
						<div class="owners-book-author">'.$exc_donors_book->book_author.'</div>
						<div class="recep">'.$exchanges['recepients_name'].'</div>
						<div class="receps-book-wrapper"><img src="'.$img_path_d.'" width="50px" alt=""></div>
						<div class="receps-book-name">'.$exc_recepients_book->book_name.'</div>
						<div class="receps-book-author">'.$exc_recepients_book->book_author.'</div>
						<div class="date">'.date('d.m.Y', $exchanges['time']).'</div>
						<div class="status">'.$status.'</div>
						<div class="actions d-flex justify-content-center flex-column">
							<form action="exchange-accept.php" method="POST">
								<input type="hidden" name="exchangeid" value="'. $exchanges['id'] .'">
								<input type="hidden" name="whois" value="'. $_SESSION['logged_user']->id .'">
								'.$operate_button.
									$cancel_button .
									$delete_button.'
							</form>
						</div>
					</div>
				</div>
			</div>
					';
				}
				
			?>
		<!-- 	<div class="container exchange">
				<div class="row justify-content-center">
					<div class="col-11 d-flex flex-row align-items-center">
						<div class="owner">Админ</div>
						<div class="owner-wrapper"><img src="img/books_img/book.jpg" width="50px" alt=""></div>
						<div class="owners-book-name">Жоа</div>
						<div class="owners-book-author">булхаков</div>
						<div class="recep">Я</div>
						<div class="receps-book-wrapper"><img src="img/books_img/book.jpg" width="50px" alt=""></div>
						<div class="receps-book-name">Как дед убил копыто</div>
						<div class="receps-book-author">Достоевский</div>
						<div class="date">121212</div>
						<div class="status">сука</div>
						<div class="actions d-flex justify-content-center flex-column">
							<form action="exchange-accept.php" method="POST">
								<input type="hidden" name="exchangeid" value="'. $exchanges['id'] .'">
								<input type="hidden" name="whois" value="'. $_SESSION['logged_user']->id .'">
								<button>Согласие</button>
								<button>Согласие</button>
								<button>Согласие</button>
							</form>
						</div>
					</div>
				</div>
			</div> -->
</body>
</html>