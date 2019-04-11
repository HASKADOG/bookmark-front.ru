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
						<li>Активные обмены</li>
						<li><a href="book-add.php">Добавить Книгу</a></li>
					</ul>
					</div>
				</nav>

				<nav class="col-3 header__site-nav d-flex align-items-center justify-content-end">
					<ul class="header__site-nav-inner">
						<li>Книги</li>
						<li>Пользователи</li>
					</ul>
				</nav>

				<col-1 class="header__notifications align-items-center d-flex">
					<div class="header__notification-button">
						<div class="bell"><i class="far fa-bell"></i></div>
						<div class="header__notification-counter">
							<div class="header__notification-counter-center">10</div>
						</div>
					</div>
				</col-1>
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
				<div class="col-3">
					<div class="search-wrapper">
						<form action="" class="search-wrapper__search-form  d-flex">
							<input placeholder="" type="text">
							<button type="submit">Поиск</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="main">

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-auto gh">
					<div class="book-card  d-flex flex-column justify-content-center">
						<div class="book-card__book-image">
							<img src="img/books_img/book.jpg" alt="Обложка книги">
						</div>
						<div class="book-card__exchange">
							<button>Обменяться</button>
						</div>
						<div class="book-card__book-disc">
							описание описание описание описание...

							<div class="book-card__disc-show">
								<i class="fas fa-caret-down"></i>
							</div>
						</div>
						<div class="book-card__full-disc">
							<div class="book-card__author">Стивен Кинг</div>
							<div class="book-card__book-name">На Подъёме</div>
							<i class="fas fa-arrows-alt-h book-card__book-delimeter"></i>
							<div class="book-card__discription">Эту повесть Стивен Кинг написал к Хеллоуину. Скотт Кэри – разведенный компьютерный дизайнер. В его жизни все складывается не самым лучшим образом: от отношений с соседями до проблем со здоровьем, причину которых Скотт не может объяснить. до проблем со здоровьем, причину которых Скотт не может объяснить. </div>
							<div class="book-card__collaspse">
								<button>Свернуть</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-auto gh">
					<div class="book-card  d-flex flex-column justify-content-center">
						<div class="book-card__book-image">
							<img src="img/books_img/book.jpg" alt="Обложка книги">
						</div>
						<div class="book-card__exchange">
							<button>Обменяться</button>
						</div>
						<div class="book-card__book-disc">
							описание описание описание описание...

							<div class="book-card__disc-show">
								<i class="fas fa-caret-down"></i>
							</div>
						</div>
						<div class="book-card__full-disc">
							<div class="book-card__author">Стивен Кинг</div>
							<div class="book-card__book-name">На Подъёме</div>
							<i class="fas fa-arrows-alt-h book-card__book-delimeter"></i>
							<div class="book-card__discription">Эту повесть Стивен Кинг написал к Хеллоуину. Скотт Кэри – разведенный компьютерный дизайнер. В его жизни все складывается не самым лучшим образом: от отношений с соседями до проблем со здоровьем, причину которых Скотт не может объяснить. до проблем со здоровьем, причину которых Скотт не может объяснить. </div>
							<div class="book-card__collaspse">
								<button>Свернуть</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-auto gh">
					<div class="book-card  d-flex flex-column justify-content-center">
						<div class="book-card__book-image">
							<img src="img/books_img/book.jpg" alt="Обложка книги">
						</div>
						<div class="book-card__exchange">
							<button>Обменяться</button>
						</div>
						<div class="book-card__book-disc">
							описание описание описание описание...

							<div class="book-card__disc-show">
								<i class="fas fa-caret-down"></i>
							</div>
						</div>
						<div class="book-card__full-disc">
							<div class="book-card__author">Стивен Кинг</div>
							<div class="book-card__book-name">На Подъёме</div>
							<i class="fas fa-arrows-alt-h book-card__book-delimeter"></i>
							<div class="book-card__discription">Эту повесть Стивен Кинг написал к Хеллоуину. Скотт Кэри – разведенный компьютерный дизайнер. В его жизни все складывается не самым лучшим образом: от отношений с соседями до проблем со здоровьем, причину которых Скотт не может объяснить. до проблем со здоровьем, причину которых Скотт не может объяснить. </div>
							<div class="book-card__collaspse">
								<button>Свернуть</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-auto gh">
					<div class="book-card  d-flex flex-column justify-content-center">
						<div class="book-card__book-image">
							<img src="img/books_img/book.jpg" alt="Обложка книги">
						</div>
						<div class="book-card__exchange">
							<button>Обменяться</button>
						</div>
						<div class="book-card__book-disc">
							описание описание описание описание...

							<div class="book-card__disc-show">
								<i class="fas fa-caret-down"></i>
							</div>
						</div>
						<div class="book-card__full-disc">
							<div class="book-card__author">Стивен Кинг</div>
							<div class="book-card__book-name">На Подъёме</div>
							<i class="fas fa-arrows-alt-h book-card__book-delimeter"></i>
							<div class="book-card__discription">Эту повесть Стивен Кинг написал к Хеллоуину. Скотт Кэри – разведенный компьютерный дизайнер. В его жизни все складывается не самым лучшим образом: от отношений с соседями до проблем со здоровьем, причину которых Скотт не может объяснить. до проблем со здоровьем, причину которых Скотт не может объяснить. </div>
							<div class="book-card__collaspse">
								<button>Свернуть</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-auto gh">
					<div class="book-card  d-flex flex-column justify-content-center">
						<div class="book-card__book-image">
							<img src="img/books_img/book.jpg" alt="Обложка книги">
						</div>
						<div class="book-card__exchange">
							<button>Обменяться</button>
						</div>
						<div class="book-card__book-disc">
							описание описание описание описание...

							<div class="book-card__disc-show">
								<i class="fas fa-caret-down"></i>
							</div>
						</div>
						<div class="book-card__full-disc">
							<div class="book-card__author">Стивен Кинг</div>
							<div class="book-card__book-name">На Подъёме</div>
							<i class="fas fa-arrows-alt-h book-card__book-delimeter"></i>
							<div class="book-card__discription">Эту повесть Стивен Кинг написал к Хеллоуину. Скотт Кэри – разведенный компьютерный дизайнер. В его жизни все складывается не самым лучшим образом: от отношений с соседями до проблем со здоровьем, причину которых Скотт не может объяснить. до проблем со здоровьем, причину которых Скотт не может объяснить. </div>
							<div class="book-card__collaspse">
								<button>Свернуть</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-auto gh">
					<div class="book-card  d-flex flex-column justify-content-center">
						<div class="book-card__book-image">
							<img src="img/books_img/book.jpg" alt="Обложка книги">
						</div>
						<div class="book-card__exchange">
							<button>Обменяться</button>
						</div>
						<div class="book-card__book-disc">
							описание описание описание описание...

							<div class="book-card__disc-show">
								<i class="fas fa-caret-down"></i>
							</div>
						</div>
						<div class="book-card__full-disc">
							<div class="book-card__author">Стивен Кинг</div>
							<div class="book-card__book-name">На Подъёме</div>
							<i class="fas fa-arrows-alt-h book-card__book-delimeter"></i>
							<div class="book-card__discription">Эту повесть Стивен Кинг написал к Хеллоуину. Скотт Кэри – разведенный компьютерный дизайнер. В его жизни все складывается не самым лучшим образом: от отношений с соседями до проблем со здоровьем, причину которых Скотт не может объяснить. до проблем со здоровьем, причину которых Скотт не может объяснить. </div>
							<div class="book-card__collaspse">
								<button>Свернуть</button>
							</div>
						</div>
					</div>
				</div>
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