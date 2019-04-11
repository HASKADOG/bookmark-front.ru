<?php 
require 'libs/bd.php';

if (isset($_SESSION['logged_user']))
	{
		$user = R::load('users', $_SESSION['logged_user']->id);

		if ($user->avatar_path == "empty"){
			$user->avatar_path = "img/profile_img/not_found.png";
		}
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
						<img width="200px" src="<?php echo $user->avatar_path; ?>" alt="">
					</div>
				</div>
				<div class="col">
					<div class="profile-info">
						<div class="profile-info-wrapper">
							<div class="profile-info__name">Имя: <?= $_SESSION['logged_user']->name . ' ' . $_SESSION['logged_user']->surname; ?></div>
						<div class="profile-info__login">Логин: <?= $user->login; ?></div>
						<div class="profile-info__email">E-mail: <?= $_SESSION['logged_user']->email; ?></div>


						<div class="profile-info__status">
							

						</div>

						<?php if ($_SESSION['logged_user']->status == 'Ученик'): ?>
							Должность: <?= $_SESSION['logged_user']->status; ?> <br>
							Класс: <?= $_SESSION['logged_user']->klass . ' ' . $_SESSION['logged_user']->klassLiter; ?>
							<?php else: ?>
							Должность: <?= $_SESSION['logged_user']->status; ?>
						<?php endif; ?>


						<div class="profile-info__about-user">Обо мне: <?= $user->about_me; ?></div>
						</div>
						<div class="profile-info__redact-profile-wrapper d-flex flex-row">
							<div class="profile-info__redact-profile mr-4">
								<form action="">
									<a href="profile-redaction.php"><i class="fas fa-pencil-alt"></i> Редактировать профиль</a>
								</form>
							</div>
							<div class="profile-info__add-book">
								
									<a href="book-add.php"><i class="fas fa-plus"></i> Добавить книгу</a>
							
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
			
				
				<?php 
				$num_of_books = R::count('books');
				


				foreach ($user->ownBooksList as $users_books) {
					if ($users_books->books_img == '') {
						$img_path = 'img/site_images/not_found.png';
					} else {
						$img_path = $users_books->books_img;
					} 
					echo ' 
						<div class="col-auto">
					<div class="users-book-card d-flex flex-row">
						<div class="users-book-card__img">
							<img src="'.$img_path.'" alt="">
						</div>
						<div class="users-book-card__about-wrapper justify-content-between d-flex flex-column">
							<div class="users-book-card__name">'.$users_books->book_name.'</div>
							<div class="users-book-card__about-book"><form action=""><button>О книге</button></form></div>
						</div>
						<div class="users-book-card__func-wrapper justify-content-around d-flex flex-column align-items-center">
							<div class="users-book-card__delete">
								<form action="delete-book.php" method="GET">
									<input type="hidden" name="book_id" value="'.$users_books->id.'">
									<button type="submit"><i class="fas fa-trash-alt"></i></button>
								</form>
							</div>
							<div class="users-book-card__redact">
								<form action="book-redaction.php" method="GET">
									<input type="hidden" name="book_id_1" value="'.$users_books->id.'">
									<button type="submit"><i class="fas fa-pencil-alt"></i></button>
								</form>
							</div>
						</div>
						
		
					</div>
				</div> <div class="w-100"></div>

					';
				}
			 ?>


			</div>
		</div>
	</section>
</body>
</html>