<?php 
require 'libs/bd.php';

$data = $_POST;
if (isset($data['do_register'])) 
{
	$errors = array();

	if (trim($data['login']) == '') { $errors[] = 'Введите логин!'; }
	if (trim($data['name']) == '') { $errors[] = 'Введите имя!';}
	if (trim($data['surname']) == '') { $errors[] = 'Введите Фамилию!';}
	if ($data['password'] == '') { $errors[] = 'Введите пароль!'; }
	if ($data['password2'] != $data['password']) { $errors[] = 'Пароли не совпадают!'; }
	if (($data['klass'] == '') && ($data['status'] == 'Ученик')) { $errors[] = 'Введите ваш класс!'; }
	elseif (($data['klass'] > 11) && ($data['klass'] < 0) && ($data['status'] == 'Ученик')) {
		$errors[] = 'Вы не можете учиться в этом классе! Введите чисто от 1 до 11.';  }
	if (($data['klassLiter'] == '') && ($data['status'] == 'Ученик') ) { $errors[] = 'Введите параллель!';}
	
	if (R::count('users', "login = ?", array($data['login'])) > 0)
	{
		$errors = 'Пользователь с таким логином уже зарегистрирован!';
	}

	if (empty($errors))
	{
		//Регаем
		$user = R::dispense('users');
		$user->login = trim($data['login']);
		$user->email = 'noemail@noemail.ru';
		$user->name = trim($data['name']);
		$user->surname = trim($data['surname']);
		$user->first_password = password_hash($data['password'], PASSWORD_DEFAULT);
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		$user->klass = $data['klass'];
		$user->klassLiter = trim($data['klassLiter']);
		$user->status = $data['status'];
		$user->avatarPath = 'empty';
		$user->isAdmin = false;
		R::store($user);
		echo '<div style="color: green;">Пользователь зарегистрирован!</div> <hr>';
	} else {
		echo '<div style="color: red;">'.array_shift($errors).'</div> <hr>';
	}

}




 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Регистрация</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/register.css">
</head>
<body class="login_bcg">
<div class="container h-100 login">
	<div class="row h-100 justify-content-center ">
		
			<div class="col-3">
				<div class="register">
				<form action="register.php" method="POST">
						<input placeholder="Логин: " type="text" name="login" value="">
						<input placeholder="Имя: " type="text" name="name" value="">
						<input placeholder="Фамилия: " type="text" name="surname" value="">
						<input placeholder="Пароль: " type="password" name="password" value="">
						<input placeholder="Пароль ещё раз: " type="password" name="password2" value="">
						<input placeholder="Класс (толко цифра):" placeholder="Пропустите, если учитель" type="text" name="klass" value="">
						<input placeholder="Параллель (только буква): " placeholder="Пропустите, если учитель" type="text" name="klassLiter" value="">
						<div class="status-wrapper d-flex justify-content-start">
							<input class="redeo" placeholder="Статус: " type="radio" id="radio_teacher" name="status" value="Учитель">
							<label for="radio_teacher">Учитель</label>
							<input class="redeo" placeholder="" type="radio" id="radio_student" name="status" value="Ученик">
							<label for="radio_student">Ученик</label>
						</div>
						
		
		
						<button type="submit" name="do_register">Зарегистрировать</button>
					</form>
				</div>
			</div>
		
 	
	</div>
</div>

</body>
</html>