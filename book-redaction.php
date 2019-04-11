<?php 
require 'libs/bd.php';

$errors = array();
$data = $_POST;

if (isset($_SESSION['logged_user']))
	{
		$book = R::load('books', 2);//$_GET['book_id']
	} else {
		header("Location: login.php");
	}

if ($book->users_id == $_SESSION['logged_user']->id)
{
	echo "Все норм!";
} else {
	$errors[] = "Эта книга вам не принадлежит! Положите на место!!!";
}

if (isset($data['accep_change'])){
	//if ($data['data_name_change'] != ""){
		$book->book_name = $data['book_name_change'];
	//}
	if ($data['book_author_change'] != ""){
		$book->book_author = $data['book_author_change'];
	}
	if ($data['book_desk_change'] == ""){
		$book->book_desc = $data['book_desk_change'];
	}

	if (($data['book_name_change'] == "") && ($data['book_author_change'] == "") && ($data['book_desk_change'] == "")){
		$errors[] = "Вы не написали что изменить!";
	}
	
	if(empty($errors)) {
		R::store($book);
		$errr = "Успешно!";
	} else {
		$errr = array_shift($errors);
	}
	
}

if (isset($data['upload'])){
	$file_name = time() . '_' . $book->id . '_' . $_FILES['uploadFile']['name'];
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
		if ($book->books_img == 'empty') 
		{
			move_uploaded_file($file_tmp, "img/books_img/" . $file_name);
			echo 'Файл загружен! <br>';
			$book->books_img = 'img/books_img/' . $file_name;
			R::store($book);
			$errr = "Успешно!";
		} else {
			unlink($book->books_img);
			move_uploaded_file($file_tmp, "img/books_img/" . $file_name);
			echo 'Файл загружен! <br>';
			$book->books_img = 'img/books_img/' . $file_name;
			R::store($book);
			$errr = "Успешно!";
		}
		
		
	} else {
		$errr = array_shift($errors);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $_SESSION['logged_user']->name . ' ' . $_SESSION['logged_user']->surname; ?></title>
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
	<div class="container">
		<div class="row">
				<div class="col-5 redact-module">
					<h5><?php echo $errr; ?></h5>
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="file" name="uploadFile">
						<button type="submit" name="upload">Загрурзить</button>
					</form>
					<form action="" method="POST" enctype="multipart/form-data">
						
						<input placeholder="Изменить назавание" type="text" name="book_name_change">
						<input placeholder="Изменить автора" type="text" name="book_author_change">
						<textarea placeholder="Изменить описание" name="book_desk_change" cols="30" rows="7"></textarea>
						<button type="submit" name="accep_change">Изменить</button>
					</form>
				</div>
			
		</div>
	</div>
</body>
</html>