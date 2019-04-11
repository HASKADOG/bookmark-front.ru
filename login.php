<?php 
require 'libs/bd.php';
$data = $_POST;
if(isset($data['do_login']))
{
	$errors = array();
	$user = R::findOne('users', 'login = ?', array($data['login']));
	if ($user)
	{
		if (password_verify($data['password'], $user->password))
		{
			//Логиним
			$_SESSION['logged_user'] = $user;
			header("Location: index.php");
			echo '<div style="color: green;">Вы успешно авторизованы! <br> 
			<a href="/index.php"> Перейти на главную.</a>
			 </div> <hr>';
			    // перенаправление на нужную страницу
   			exit();
		} else 
		{
			$errors[] = 'Не верный пароль';
		}
	} else
	{
		$errors[] = 'Пользователь не найден';
	}

if (empty($errors)){}


}
 ?>

<!DOCTYPE html>
<html lang="en" class="">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Вход</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body class="">
	<div class="login-wrapper h-100 justify-content-center flex-column d-flex align-items-center">
		<div class="login">
			<form action="login.php" class="d-flex flex-column" method="POST">
 				<input class="mb-2" placeholder="Логин" type="text" name="login">
 				<input class="mb-2" placeholder="Пароль" type="password" name="password">
 				<button type="submit" name="do_login">Войти</button>
 			</form>
 			
		</div>
		<?php 
			if (! empty($errors))
			{
				$errors_active = "errors_active";
				$show_error = array_shift($errors);
			} 
		 ?>
		<div class="errors <?php echo $errors_active; ?>">
			<?php echo $show_error ?>
		</div>
	</div>	

</body>
</html>