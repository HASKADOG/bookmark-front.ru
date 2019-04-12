<?php 
	require 'libs/bd.php';

	if (isset($_SESSION['logged_user']))
	{
		$name = $_SESSION['logged_user']->name;
		$name_link = "profile.php";
		$exit_button = "";
	} else {
		header("Location: login.php");
		$name = "Войти на сайт";
		$name_link = "login.php";
		$exit_button = "hidden";
	}
	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Книги</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>


	<header>
		<div class="container header">
			<div class="row header__row justify-content-start align-items-center h-100">
				<div class="col-auto header__avatar">
					<img src="<?php echo $_SESSION['logged_user']->avatar_path; ?>" alt="Аватарка">
				</div>
				<nav class="col header__user-nav d-flex justify-content-start">
					<div class="header__user-nav-wrapper">
					<ul>
						<li class="header__user-name">
								<a href="<?php echo $name_link ?>"><? echo $name; ?></a>
							</li>
						<li class="header__exit-link <?php echo $exit_button; ?>"><a href="logout.php">Выйти</a></li>
					</ul>
					<ul class="header__user-nav-inner">
						<li><a href="profile.php">Профиль</a></li>
						<li><a href="active.php">Активные обмены</a></li>
						<li><a href="book-add.php">Добавить Книгу</a></li>
					</ul>
					</div>
				</nav>

				

				
			</div>
		</div>
	</header>
	<section class="search">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-3">
					<div class="book-wrapper">
						<div class="book-wrapper__books">КНИГИ</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<section class="main">

		<div class="container">
			<div class="row justify-content-center">
				
				<?php 
				$all_books = R::getAll('select * from `books`');
				foreach ($all_books as $users_books) { 
					$owner = R::load('users', $users_books['users_id']);

					$button_status = '';
					$button_content = 'Обменятся';
					if ($users_books['users_id'] == $_SESSION['logged_user']->id)
					{
						$button_status = 'disabled';
						$button_content = 'Ваша книга';
					} 

					if (! $_SESSION['logged_user']->id) {
						$button_status = 'disabled';
						$button_content = 'Войдите на сайт';
					}


					if ($users_books['books_img'] == '') 
					{
						$img_path = 'img/site_images/not_found.png';
					} else {
						$img_path = $users_books['books_img'];
					} 
					echo '<div class="col-auto gh">
					<div class="book-card  d-flex flex-column justify-content-center">
						<div class="book-card__book-image">
							<img src="'.$img_path.'" alt="Обложка книги">
						</div>
						<div class="book-card__exchange">
							<form action="exchange.php" method="POST">
									<input type="hidden" name="book_id" value="'.$users_books['id'].'">
									<button '.$button_status.' style="border: none; background: none; color:#fff;" type="submit">'.$button_content.'</button>
								</form>
							
						</div>
						<div class="book-card__book-disc">
							'.$users_books['book_name'].'

							<div class="book-card__disc-show">
								<form action="book-page.php" method="GET">
									<input type="hidden" name="book_id" value="'.$users_books['id'].'">
									<button style="border: none; background: none; color:#fff;" type="submit"><i class="fas fa-caret-down"></i></button>
								</form>
							</div>
						</div>
						
					</div>
				</div>';
				}


			 ?>

			</div>
		</div>
	</section>

	<footer>
		<div class="container"><div class="row"></div></div>
	</footer>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script > 
		$(document).ready(function(){
			$('.book-card__disc-show').click(function () {
 				$(".book-card__full-disc").toggleClass('show');
			});
		});

		$(document).ready(function(){
			$('.book-card__collaspse').click(function () {
 				$(".book-card__full-disc").removeClass('show');
			});
		});
	</script>
</body>
</html>