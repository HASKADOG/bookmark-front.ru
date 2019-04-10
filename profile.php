<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Дмитрий Сорокопудов</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/profile.css">
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
	
	<section class="profile p-5">
		<div class="container">
			<div class="row">
				<div class="col-md-auto">
					<div class="avatar-profile">
						<img width="200px" src="img/profile_img/1547671809_2_Buddy.jpeg" alt="">
					</div>
				</div>
				<div class="col">
					<div class="profile-info">
						<div class="profile-info-wrapper">
							<div class="profile-info__name">Имя: Дмитрий Сорокопудов</div>
						<div class="profile-info__login">Логин: cplasplas</div>
						<div class="profile-info__email">E-mail: cplasplas16@gmail.com</div>
						<div class="profile-info__status">Должность: Ученик 10А</div>
						<div class="profile-info__about-user">Обо мне: Я люблю кошек, собак. Ненавижу химию и биологию. Обожаю программирование, изучаю ардуино.</div>
						</div>
						<div class="profile-info__redact-profile-wrapper d-flex flex-row">
							<div class="profile-info__redact-profile mr-4">
								<form action="">
									<button type="submit"><i class="fas fa-pencil-alt"></i> Редактировать профиль</button>
								</form>
							</div>
							<div class="profile-info__add-book">
								<form action="">
									<button type="submit"><i class="fas fa-plus"></i> Добавить книгу</button>
								</form>
							</div>
					
						</div>
				</div>
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="h1 pb-4 col-auto">Ваши книги: </div>
		</div>
	</div>
	<section class="users-book">
		<div class="container">
			<div class="row">
				<div class="col-auto">
					<div class="users-book-card d-flex flex-row">
						<div class="users-book-card__img">
							<img src="img/books_img/book.jpg" alt="">
						</div>
						<div class="users-book-card__about-wrapper justify-content-between d-flex flex-column">
							<div class="users-book-card__name">Зулейха Окрывает глаза</div>
							<div class="users-book-card__about-book"><form action=""><button>О книге</button></form></div>
						</div>
						<div class="users-book-card__func-wrapper justify-content-around d-flex flex-column align-items-center">
							<div class="users-book-card__delete">
								<form action="">
									<button type="submit"><i class="fas fa-trash-alt"></i></button>
								</form>
							</div>
							<div class="users-book-card__redact">
								<form action="">
									<button type="submit"><i class="fas fa-pencil-alt"></i></button>
								</form>
							</div>
						</div>
						
		
					</div>
				</div> <div class="w-100"></div>

			</div>
		</div>
	</section>
</body>
</html>