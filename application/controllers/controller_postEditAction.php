<?php
class Controller_PostEditAction extends Controller
{
	function __construct()
	{
		$this->model = new Model_Posts();
		$this->view = new View();
		$menu = new View();
		$this->model->id = $_GET['id'];
	}
	
	function action_index()
	{
		session_start();
		$user = new Model_Users();

		if($user->checkLogin($_SESSION['admin'], $_SESSION['cpass']))
		{
			// continue;
		}
		else
		{
			session_destroy();
			header('Location:/login');
		}
		
		if($this->model->id == 0)
		{
			$result = $this->model->Add($_POST);
			$resultName = 'addition';
		}
		else
		{
			$result = $this->model->Update($_POST);
			$resultName = 'update';
		}

		if(isset($result))
		{
			if($resultName == 'addition'){
				header('Location: /postView?id='.$this->model->GetLastId());
			}
			elseif($resultName == 'update'){
				header('Location: /postView?id='.$this->model->id);
			}
			else
			{
				// заглушка
				header('Location:/404');
			}
		}
		else
		{
			header('Location:/404');
		}	
	}
}
