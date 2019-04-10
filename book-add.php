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
					<div class="prof-red">Добавить книгу</div>
				</div>
			</div>
		</div>
	</header>
	
	<section class="profile-redaction">
		<div class="container">
			<div class="row">
				<div class="col-5 redact-module">
					<h5>Добавить книгу</h5>
					
		
			<input placeholder="Название книги" type="text" name="book_name">
		
		
			<input placeholder="Автор" type="text" name="book_author">
		
			<textarea placeholder="Описание книги" name="book_desc"></textarea>
		
			<input placeholder="Обложка книги" type="file" name="book_image">
		
			<button type="submit" name="add_book">Загрузить книгу</button>
		
	
				</div>
			</div>
		</div>
	</section>

</body>
</html>