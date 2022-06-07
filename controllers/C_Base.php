<?php
//
// Базовый контроллер сайта.
//
abstract class C_Base extends C_Controller
{
	protected $title;		// заголовок страницы
	protected $content;		// содержание страницы
    protected $keyWords;
	protected $userLogin;


     protected function before(){

		$this->title = 'тест';
		$this->content = '';
		$this->keyWords="...";
		$this->userLogin = '';

	}
	
	//
	// Генерация базового шаблонаы
	//	
	public function render()
	{
		$vars = array('title' => $this->title, 'content' => $this->content,'kw' => $this->keyWords,'userLogin'=>$this->userLogin);
		$page = $this->Template('views/v_main.php', $vars);				
		echo $page;
	}	
}
