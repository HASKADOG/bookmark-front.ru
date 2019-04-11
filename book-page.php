<?php 
require 'libs/bd.php';

$errors = array();
$data = $_POST;

if (isset($_SESSION['logged_user']))
	{
		$book = R::load('books', $_GET['book_id']);//$_GET['book_id']
		$owner = R::load('users', $book->users_id);
	} else {
		header("Location: login.php");
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

	<section class="profile p-5">
		<div class="container">
			<div class="row">
				<div class="col-md-auto">
					<div class="avatar-profile">
						<img width="200px" src="<?php echo $book->books_img; ?>" alt="">
					</div>
				</div>
				<div class="col">
					<div class="profile-info">
						<div class="profile-info-wrapper">
							<div class="profile-info__name">Название: <?php echo $book->book_name; ?></div>
						<div class="profile-info__login">Автор: <?= $book->book_name; ?></div>
						


					

					


						<div class="profile-info__about-user">Описание: <?= $book->book_desc; ?></div>
						</div>
						<div class="profile-info__about-user">Владелец: <?= $owner->name . ' ' . $owner->surname; ?> </div>
						</div>
						<div class="profile-info__about-user">Емейл владельца: <?= $owner->email; ?> </div>
						</div>
				</div>
			</div>
		</div>
	</section>

</body>
</html>