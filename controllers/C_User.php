<?php
//
// Конттроллер страницы чтения.
//
include_once('models/m_user.php');

class C_User extends C_Base
{
	//
	// Конструктор.
	//
	public $user;
	function __construct(){
		$this->user = new M_User();
		session_start();
	}

	public function action_index(){
		if ($_SESSION['user_id']){
			$this->action_info();
		} else {
			$this->action_auth();
		}
	}

	public function action_auth(){
		$this->title .= '::Авторизация';
		$info = "Требуется авторизация. Введите логин и пароль..";
		$this->content = $this->Template('views/v_userAuth.php', array('text' => $info));
		if($_POST){
			$pars = [];
			foreach($_POST as $key => $value){
				$pars[$key] = strip_tags($value);
			}
			$result = $this->user->auth($pars);
			if ($result){
				$this->action_info();	
			} else {
				$info = "<h3>Не верный login или пароль, либо пользователя с {$pars['login']} не существует</h3>" ;
				$this->content = $this->Template("views/v_userAuth.php", array('text' => $info));	
			}
		}
	}

	public function action_reg(){
		$this->title .= " :: Регистрация";
		$info = "Введите данные для регистрации нового пользователя.";
		$this->content = $this->Template('views/v_userReg.php', array('text' => $info));
		if($_POST){
			$pars = [];
			foreach($_POST as $key => $value){
				$pars[$key] = strip_tags($value);
			}
			$info = $this->user->new($pars);
		    $this->content = $this->Template('views/v_user.php', array('text' => $info));
		} 
	}
	public function action_logout(){
		$logout = $this->user->logout();
		if ($logout){
			$this->userLogin ='';
			header('Location: index.php?c=User');
			$this->action_auth();
		} else {
			header('Location: index.php');
		}
	}
	public function action_info(){
		$this->title .='::Информация о пользователе';
		$id = $_SESSION['user_id'];
		$this->userLogin = ' [ ' .$this->user->getUserLogin($id) . ' ]';
		$info = $this->user->info($id);
		$this->content = $this->Template('views/v_userInfo.php', array('text' => $info));	
	}
}
