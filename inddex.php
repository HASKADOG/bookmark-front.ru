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
			<div class="row header__row justify-content-start h-100">
				<div class="col-auto header__avatar">
					<img src="img/profile_img/1547671809_2_Buddy.jpeg" alt="Аватарка">
				</div>
				<nav class="col header__user-nav d-flex justify-content-start">
					<div class="header__user-nav-wrapper">
					<ul>
						<li class="header__user-name">Дмитрий Сорокопудов</li>
						<li class="header__exit-link">Выйти</li>
					</ul>
					<ul class="header__user-nav-inner">
						<li>Профиль</li>
						<li>Активные обмены</li>
						<li>Добавить Книгу</li>
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

	<section class="main">
		<div class="container">
			<div class="row justify-content-around">
				<div class="col-auto gh">
					<div class="book-card d-flex flex-column justify-content-center">
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
					</div>
				</div>
				
			</div>
		</div>
	</section>

	<footer></footer>
</body>
</html>