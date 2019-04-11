<?php 
require 'libs/bd.php';
$users_profile = R::load('users', $_SESSION['logged_user']->id);
$error = "Добавить книгу";
$data = $_POST;

if (isset($data['add_book'])) 
{
	$errors = array();

	$file_name = time() . '_' . $users_profile->id . '_' . $_FILES['book_image']['name'];
	$file_size = $_FILES['book_image']['size'];
	$file_tmp = $_FILES['book_image']['tmp_name'];
	$file_type = $_FILES['book_image']['type'];

	$allowed_extensions = array("jpeg", "jpg", "png");
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);

	if (! in_array($ext, $allowed_extensions)) {
		$errors[] = 'Не верный формат';
	}

	if ($file_size > 12582912) {
		$errors[] = 'Вес файла не может превышать 12 MB!';
	}

	if ($data['book_name'] == '')
	{
		$errors[] = 'Введите название книги!';
	}

	if ($data['book_author'] == '')
	{
		$errors[] = 'Введите автора!';
	}

	if (empty($errors))
	{	
		$books = R::dispense('books');
		if ($file_name != '')
		{
			move_uploaded_file($file_tmp, "img/books_img/" . $file_name);
			$books->books_img = 'img/books_img/' . $file_name;
		}
		$books->book_name = $data['book_name'];
		$books->book_author = $data['book_author'];
		$books->book_desc = $data['book_desc'];

		$users_profile->ownBooksList[] = $books;
		R::store($users_profile);
		$error = '<p style="color: green;">Книга добавлена!</p>';
	} 
	else 
	{
		$error = array_shift($errors);
	}
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавить книгу</title>
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
					<div class="prof-red">Добавить книгу</div>
				</div>
			</div>
		</div>
	</header>
	
	<section class="profile-redaction">
		<div class="container">
			<div class="row">
				<div class="col-5 redact-module">
					<h5><?php echo $error; ?></h5>
					
					<form action="" method="POST" enctype="multipart/form-data">
					<input placeholder="Название книги" type="text" name="book_name">
		
		
					<input placeholder="Автор" type="text" name="book_author">
		
					<textarea placeholder="Описание книги" name="book_desc"></textarea>
		
					<input placeholder="Обложка книги" type="file" name="book_image">
		
					<button type="submit" name="add_book">Загрузить книгу</button>
		</form>
	
				</div>
			</div>
		</div>
	</section>

</body>
</html>