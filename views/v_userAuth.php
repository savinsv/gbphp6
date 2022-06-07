<?php
/**
 * Шаблон редактора
 * ================
 * $text - текст статьи
 */
?>
<?php  if ($text): ?>
	<h4> <?=$text?> </h4>
<?php endif ?>
<form method="post">
	<div class="fields">
		<div class="input-field">
			<label for="login" class="label-field">Login</label>
			<input name="login" placeholder="login" required/>
		</div>
		<div class="input-field">
			<label for="password" class="label-field">Пароль</label>
			<input name="password" placeholder="password" required/>
		</div>
	</div>

<!-- 	<textarea name="text"><?=$text?></textarea>
 -->
	<div class="btn-bloc">
		<input type="submit" value="Вход" class="btn-link"/>
		<a href="index.php?c=User&action=reg" class="btn-link">Регистрация</a>
	</div>
</form>
