<?php 
require 'libs/bd.php';
$users_profile = R::load('users', $_SESSION['logged_user']->id);

//PHOTO UPLOAD
if (isset($_FILES['uploadFile'])) 
{
	$errors = array();
	$file_name = time() . '_' . $users_profile->id . '_' . $_FILES['uploadFile']['name'];
	$file_size = $_FILES['uploadFile']['size'];
	$file_tmp = $_FILES['uploadFile']['tmp_name'];
	$file_type = $_FILES['uploadFile']['type'];

	$allowed_extensions = array("jpeg", "jpg", "png");
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);

	if (! in_array($ext, $allowed_extensions)) {
		$errors[] = 'Не верный формат';
	}

	if ($file_size > 12582912) {
		$errors[] = 'Вес файла не может превышать 12 MB!';
	}

	if (empty($errors)) {
		if ($users_profile->avatar_path == 'empty') 
		{
			move_uploaded_file($file_tmp, "img/profile_img/" . $file_name);
			echo 'Файл загружен! <br>';
			$users_profile->avatar_path = 'img/profile_img/' . $file_name;
			R::store($users_profile);
		} else {
			unlink($users_profile->avatar_path);
			move_uploaded_file($file_tmp, "img/profile_img/" . $file_name);
			echo 'Файл загружен! <br>';
			$users_profile->avatar_path = 'img/profile_img/' . $file_name;
			R::store($users_profile);
		}
		
		
	} else {
		echo array_shift($errors);
	}
}
//PHOTO UPLOAD

$data = $_POST;

//LOGIN EDIT
if (isset($data['accept_login_edit']))
{
	$errors = array();
	$check_login = R::count('users', 'login = ?', array($data['login_edit']));

	if ($check_login > 0){
		$errors[] = 'Этот логин занят!';
	}

	$login_edit_status = '';
	if (empty($errors))
	{
		$login_edit_status = 'Логин изменён!';
		$users_profile->login = $data['login_edit'];
		R::store($users_profile);
	} else {
		$login_edit_status = array_shift($errors);
	}
}
//LOGIN EDIT

//PASSWORD EDIT
if (isset($data['accept_password_edit'])) {
	$errors = array();

	if ($users_profile->mail == 'noemail@noemail.ru') {
		$errors[] = 'Для изменения пароля сначала привяжите почту!';
	}

	if (! password_verify($data['password_check'], $users_profile->password)) 
	{
		$errors[] = 'Не верный старый пароль!';
	}

	if ($data['password_edit'] != $data['password_edit2']) 
	{	
		$errors[] = 'Пароли не совпадают!';
	}

	if (empty($errors)) {
		$users_profile->password = password_hash($data['password_edit'], PASSWORD_DEFAULT);
		R::store($users_profile);
	} else {
		echo array_shift($errors);
	} 
}
//PASSWORD EDIT
//add messengers
if (isset($data['add_telegram'])) {
	$users_profile->telegram = $data['telegram'];
	R::store($users_profile);
}

if (isset($data['add_vk'])) {
	$users_profile->vk = $data['vk'];
	R::store($users_profile);

}
//add messengers

//about_me
if (isset($data['about_me'])) {
	$users_profile->about_me = $data['about_me_a'];
	R::store($users_profile);

}
?>

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
				
				<div class="col-5 redact-module">
					<h5>О себе</h5>
					<form action="" method="POST">
						<textarea name="about_me_a" id="" cols="30" rows="5"></textarea>
						<button type="submit" name="about_me">Изменить</button>
					</form>
				</div>
				
				<div class="w-100"></div>

			</div>
		</div>
	</section>

</body>
</html>