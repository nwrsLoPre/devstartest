<?php
class Controller_Login extends Controller
{
	function action_index()
	{
		function __construct()
		{

		}

		$user = new Model_Users();

		if(isset($_POST['login']) && isset($_POST['password']))
		{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$passCrypt = crypt($_POST['password'], '$2a$10$1qAz2wSx3eDc4rFv5tGb5t');

			if($user->checkLogin($login, $passCrypt))
			{
				$user->login($login, $passCrypt);
				header('Location:/admin');
			}
			else
			{


			}
		}
		else
		{
			$data["login_status"] = "";
		}
		
		$title = 'Административный раздел';
		$header = 'Административный раздел';
		$data = '';
		$this->view->generate('login_view.php', 'templates/templateAdmin_view.php', $data, 'menuLogin_view.php', $menuItems, $header, $title);
	}
}
