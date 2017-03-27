<?php
class Controller_PostView extends Controller
{
	function __construct()
	{
		$this->model = new Model_Posts();
		$this->view = new View();
		$menu = new View();
		$this->model->id = $_GET['id'];
		$this->model->loadInfoById();
	}

	function action_index()
	{
		if(isset($this->model->name))
		{
			$title = $this->model->name;
			$header = $this->model->name;
            $data['name'] = $this->model->name;
            $data['message'] = $this->model->message;
            $data['date'] = $this->model->date;
			$menuItems = $this->model->getArchive();
			$this->view->generate('postView_view.php', 'template_view.php', $data, 'menu_view.php', $menuItems, $header, $title, '','blank_view.php');
		}
		else
		{
			header('Location:/404');
		}	
	}
}
