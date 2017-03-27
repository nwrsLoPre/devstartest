<?php
class Controller_Archive extends Controller
{
	function __construct()
	{
		$this->model = new Model_Posts();
		$this->view = new View();
		$menu = new View();

	}
	
	function action_index()
	{
		$data = $this->model->GetList('*', '', 'id DESC', $GLOBALS['config']['post']['per_page'], $page);		
		$menuItems = $this->model->getArchive(); // пробуем включить меню ...
		$this->view->generate('archive_view.php', 'template_view.php', $data, 'menu_view.php', $menuItems);
	}
}
