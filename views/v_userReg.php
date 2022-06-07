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

	<div id="fio" class="fields">
		<div id="surname" class="input-field">
			<label for="surname" class="label-field">Фамилия</label>
			<input name="surname" id="surname" placeholder="Фамилия" required/>
		</div>
		<div id="name" class="input-field">
			<label for="name" class="label-field">Имя</label>
			<input name="name" id="name" placeholder="Имя" required/>
		</div>
		<div id="partonymic" class="input-field">
			<label for="patronymic" class="label-field">Отчество</label>
			<input name="patronymic" id="patronymic" placeholder="Отчество"/>
		</div>
	</div>
	<div id="logPasEm" class="fields">
		<div class="input-field">
			<label for="login" class="label-field">Login</label>
			<input name="login" id="login" placeholder="login" required/>
		</div>
		<div class="input-field">
			<label for="password" class="label-field">Пароль</label>
			<input name="password" id="password" placeholder="password" required/>
		</div>
		<div class="input-field">
			<label for="email" class="label-field">Электронная почта</label>
			<input name="email" id="email" pattern=".+@.+\..+" placeholder="username@domaine.com" required/>
		</div>
	</div>
	<div class="btn-bloc">
		<input type="submit" value="Зарегистрировать" class="btn-link"/>
	</div>
</form>
