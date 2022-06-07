<?php
//
// Конттроллер страницы чтения.
//
//include_once('models/model.php');

class C_Catalog extends C_Base
{
	//
	// нет конструктора в C_BASE, поэтому убрали конструктор из текущего класса
	//
/* 	public $user;
	function __construct(){
		$this->user = new M_User();
		session_start();
	}
 */	
	public function action_index(){
		$this->title .= '::Все товары';
/* 		if ($_SESSION['user_id']){
			$id = $_SESSION['user_id'];
			$this->userLogin = ' [ ' .$this->user->getUserLogin($id) . ' ]';
		}
 */		//$text = text_get();
		$text = "Список всех товаров";
		//$today = date();
		$this->content = $this->Template('views/v_index.php', array('text' => $text));	
	}
	
    
	public function action_edit(){
		$this->title .= '::Редактирование';
		
		if($this->isPost())
		{
			text_set($_POST['text']);
			header('location: index.php');
			exit();
		}
		
		$text = text_get();
		$this->content = $this->Template('views/v_edit.php', array('text' => $text));		
	}
}
