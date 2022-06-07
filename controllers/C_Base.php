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
	protected $user;


     protected function before(){
		$this->user = new M_User();
		session_start();
		$this->title = 'Проект к ДЗ №6';
		$this->content = '';
		$this->keyWords="...";
		if ($_SESSION['user_id']){
			$id = $_SESSION['user_id'];
			$this->userLogin = ' [ ' .$this->user->getUserLogin($id) . ' ]';
		} else {
			$this->userLogin = '';
		}


	}
	protected function getTitle(){
		return $this->title;
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
