 <?php

/* function __autoload($classname){
	include_once("controllers/$classname.php");
}
 */
spl_autoload_register(function($name){
	$dirs = ["controllers","models","views","data"];
	$file = $name.".php";
	$check=false;
	foreach($dirs as $dir){
		$modul = "$dir/$file";
	    if(is_file($modul)){
            include_once($modul);
        }
    }

	
});


//site.ru/index.php?act=auth&c=User

$action = 'action_';
$action .=(isset($_GET['action'])) ? $_GET['action'] : 'index';
//echo($action);

switch ($_GET['c'])
{
	case 'catalog':
		$controller = new C_Catalog();
		break;
	case 'page':
		$controller = new C_Page();
		break;
	case 'cart':
		$controller = new C_Cart();
		break;
	case 'User':
		$controller = new C_User();
		break;
	default:
		$controller = new C_Catalog();
}

$controller->Request($action);
