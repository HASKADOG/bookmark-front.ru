<?php 
require 'libs/bd.php';
print_r($donor);
$data = $_POST;

$chosen_book = R::load('books', $data['book_id']);
$all_books = R::getAll('select * from `books` where `users_id` = ?', array($_SESSION['logged_user']['id']));

$donors_id = $chosen_book->users_id;



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Обменяться книгами</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/profile-redaction.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
	<header>
		<div class="container h-100">
			<div class="row h-100 align-items-center">
				<div class="col-3">
					<div class="prof-red">Профиль пользователя</div>
				</div>
			</div>
		</div>
	</header>

	<div class="container ">
		<div class="row">
			<div class="col-auto chosen_book redact-module d-flex flex-column align-items-center">
				<h4>Выбранная книга</h4>
				
				<div class="chosen_image"><img width="100px" src="<?php echo $chosen_book['books_img']; ?>" alt=""></div>				

					<div class="chosen_name"><?php echo $chosen_book['book_name']; ?></div>
					<div class="chosen_author"><?php echo $chosen_book['book_author']; ?></div>
				
			</div>
			<div class="col-auto">
				<h4>Ваши книги</h4>
				<?php 
				
				foreach ($all_books as $users_books) { 

					$button_status = 'enabled';
					$button_content = 'Обменятся';
					/*if ($users_books['users_id'] == $_SESSION['logged_user']->id)
					{
						$button_status = 'disabled';
						$button_content = 'Ваша книга';
					}*/



					if ($users_books['books_img'] == '') 
					{
						$img_path = 'img/site_images/not_found.png';
					} else {
						$img_path = $users_books['books_img'];
					} 
					echo '  
						<div class="redact-module my_book d-flex flex-row align-items-center justify-content-between">
			 				<div class="avatar"> <img src="'.$img_path.'" width="50px" alt=""></div>
			 				<div class="name">'.$users_books['book_name'].'</div>
			 				<form action="exchange-final.php" method="POST">
			 		
			 					<input type="hidden" name="recepientbookid" value="'.$users_books['id'].'">
								<input type="hidden" name="donorid" value="'.$chosen_book['users_id'].'">		
								<input type="hidden" name="recepientid" value="'.$users_books['users_id'].'">
								<input type="hidden" name="donorbookid" value="'.$chosen_book['id'].'">
								<button '. $button_status .' type="submit" name="exchangeLast">'. $button_content .'</button>
			 				</form>
			 			</div>

					';
				}


			 ?>

		
			</div>
		</div>
		
			
				
				 

			
	</div>
</body>
</html>