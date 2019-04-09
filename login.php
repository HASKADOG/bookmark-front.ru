<!-- 06.04.2019
SAFIULLIN RAMAZAN
BOOKCROSSING.COM -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Вход</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body class="login_bcg">
<div class="container-fluid login">
	<div class="row justify-content-center align-content-center">
		<div class="col-auto login__enter-word">Вход</div>
		<div class="w-100"></div>
		<div class="col login__form-row">
			<form class="login__login-form" action="login.php" method="POST">
 				<input placeholder="Login" class="login__input-login" type="text" name="login" >
 				<br>
 				<input placeholder="Password" class="login__input-password" type="password" name="password" >
 				<br>
 				<button class="login__button-submit" type="submit" name="do_login">Войти</button>
 			</form>
 		</div>
	</div>
</div>

</body>
</html>