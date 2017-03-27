<?php
class Controller_PostEdit extends Controller
{
	function __construct()
	{
		session_start();
		$this->model = new Model_Posts();
		$this->view = new View();
		$menu = new View();
		$this->model->id = $_GET['id'];
		$this->model->loadInfoById();
	}
	
	function action_index()
	{
		$user = new Model_Users();

		if($user->checkLogin($_SESSION['admin'], $_SESSION['cpass']))
		{

		}
		else
		{
			session_destroy();
			header('Location:/login');
		}

		if(isset($this->model->name) OR $this->model->id == 0)
		{
            if($this->model->id == 0)
            {
                $title = 'Создание поста';
                $header = 'Создание поста';
            }
            else {
                $title = 'Редактирование поста';
                $header = 'Редактирование поста';
            }

			$data = new stdClass();
			$data->id = $this->model->id;
			$data->name = $this->model->name;
			$data->message = $this->model->message;
			$menuItems = $this->model->getArchive();
			$this->view->generate('postEdit_view.php', 'templates/templateAdmin_view.php', $data, 'menuAdmin_view.php', $menuItems, $header, $title, '','blank_view.php');
		}
		else
		{
			header('Location:/404');
		}	
	}
}
