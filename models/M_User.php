<?
class M_User {
	public function auth(array $pars){
        $dbo = Db::Instance();
        $dbo->sql = "SELECT id, login, password, user_change, email FROM users WHERE login = :login";
        $markers=[];
        foreach($pars as $key => $value){
            $markers[":".$key ] = $value;
        }
        $row = $dbo->select(array_slice($markers,0,1));
        if ($row){
            if (password_verify($pars['password'],$row['password'])){    
            //$pass = openssl_decrypt($row['password'], "AES-128-ECB", $row['user_change']);
                if (!$_SESSION['user_id']){
                    $_SESSION['user_id'] = $row['id'];
                }
                return true;
            }
            return false;
         } else {
             return false;
         }
    }
    
    public function new(array $pars){
        $dbo = Db::Instance();
        $psel[':login'] = $pars['login'];
        $dbo->sql = "SELECT id, login, password FROM users WHERE login = :login";
        $row = $dbo->select($psel);
        $markers=[];
        $columns=[];
        foreach($pars as $key => $value){
            $markers[":".$key ] = $value;
        }
        
        if($row){
            return "Пользователь {$row['login']} уже зарегистрирован.";
        }else {

            $dbo->sql = "INSERT INTO users (surname,name,patronymic,login,password,email,user_change) 
            VALUES (:surname,:name,:patronymic,:login,:password,:email,:user_change)";
            $markers[':user_change'] = date('Y-m-d H:i:s');
            $markers[':password'] = crypt($pars['password'],"$6$" . md5($markers[':user_change']));
            //$markers[':password'] = openssl_encrypt($pars['password'], "AES-128-ECB", $markers[':user_change']);
            $row = $dbo->insert($markers);
            if ($row){
                return "Пользователь " . $pars['login'] . " успешно зарегистрирован.";
            } else {
                return "Ошибка регистрации пользователя ". $pars['login'];
            }
        }

    }

    public function logout(){
		if ($_SESSION['user_id']){
			$_SESSION['user_id'] = null;
			session_destroy();
			return true;
		} else {
			return false;
		}
    }

    public function info(int $id){
        $dbo = Db::Instance();
        $dbo->sql = "SELECT * FROM users WHERE id = :id";
        $psel[':id'] = $id; 
        $row = $dbo->select($psel);
        if ($row){
            return "Имя: {$row['name']} <br> Фамилия: {$row['surname']}
            ";
        } else {
            return "User info not found..";
        }
    }
    public function getUserLogin(int $id){
        $dbo = Db::Instance();
        $dbo->sql = "SELECT login FROM users WHERE id = :id";
        $psel[':id'] = $id; 
        $row = $dbo->select($psel);
        if ($row){
            return $row['login'];
        } else {
            return "login info not found..";
        }

    }
}