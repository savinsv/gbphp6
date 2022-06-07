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
	
	public function action_index(){
		$this->title .= '::Все товары';
		//$text = text_get();
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
