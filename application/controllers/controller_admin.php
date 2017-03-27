<?php
class Controller_Admin extends Controller
{
	function action_index()
	{
		session_start();
		$user = new Model_Users();

		if($user->checkLogin($_SESSION['admin'], $_SESSION['cpass']))
		{
			$title = 'Административный раздел';
			$header = 'Административный раздел';
			$menuItems = '';
			$data = '';
			$this->view->generate('admin_view.php', 'templates/templateAdmin_view.php', $data, 'menuAdmin_view.php', $menuItems, $header, $title, '','blank_view.php');
		}
		else
		{
			session_destroy();
			header('Location:/login');
		}
	}
}
