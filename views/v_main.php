<?php
/**
 * Основной шаблон
 * ===============
 * $title - заголовок
 * $content - HTML страницы
 */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="views/style.css" /> 	
</head>
<body>
	<div class="wrapper">
		<div id="header" class="header">
			<h1><?=$title?></h1>
		</div>
		
		<div id="menu" class="menu">
			<div class="left-side">
				<a href="index.php">Каталог</a> |
				<a href="index.php?c=cart">Корзина</a> |

<!-- 				<a href="index.php">Читать текст</a> |
				<a href="index.php?c=page&action=edit">Редактировать текст</a> |
 -->
			</div>
			<div class="right-side">
				<?php if(!$userLogin): ?>
				<a href="index.php?c=User">Вход</a>
				<?php else: ?>
				<a href="#" > Кабинет</a> |
				<a href="index.php?c=User&action=logout">Выход  <?=$userLogin?> </a>
				<?php endif; ?>
			</div>
		</div>
		
		<div id="content" class="content">
			<?=$content?>
		</div>
		
		<div id="footer" class="footer">
			Все права защищены. Адрес. Телефон.
		</div>
	</div>
</body>
</html>
