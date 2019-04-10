<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Редактировать профиль</title>
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
					<div class="prof-red">Редактирование профиля</div>
				</div>
			</div>
		</div>
	</header>
	
	<section class="profile-redaction">
		<div class="container">
			<div class="row">
				<div class="col-5 redact-module">
					<h5>Изменить аватарку</h5>
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="file" name="uploadFile">
						<button type="submit" name="upload">Загрурзить</button>
					</form>
				</div>
				<div class="w-100"></div>

				<div class="col-5 redact-module">
					<h5>Изменить Логин</h5>
					<form class="" action="" method="POST">
						<input type="text" name="login_edit" placeholder="">
						<button type="submit" name="accept_login_edit">Изменить</button>
					</form>
				</div>
				<div class="w-100"></div>
				
				<div class="col-5 redact-module">
					<h5>Изменить Пароль</h5>
					<form action="" method="POST">
						<input placeholder="Старый пароль" type="password" name="password_check">
						<input placeholder="Новый пароль" type="password" name="password_edit" placeholder="">
						<input placeholder="Повторите новый пароль" type="password" name="password_edit2" placeholder="">
						<button type="submit" name="accept_password_edit">Изменить</button>
					</form>
				</div>
				<div class="w-100"></div>

				
				<div class="w-100"></div>

			</div>
		</div>
	</section>

</body>
</html>