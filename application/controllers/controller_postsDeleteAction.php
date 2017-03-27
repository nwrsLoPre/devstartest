<?php
class Controller_PostsDeleteAction extends Controller
{
	function __construct()
	{
		$this->model = new Model_Posts();
		$this->view = new View();
		$menu = new View();
	}
	
	function action_index()
	{	
		session_start();
		
		if($_POST['delete'])
		{
			$posts = '';	
			foreach ($_POST['delete'] as $key => $value) 
			{

				$this->model->id = $value;
				$this->model->Delete();

				if($key == 0)
				{
					$posts = $value;
				}
				else
				{
					$posts = $posts.', '.$value;
				}
			}

			$title = 'Список постов';
			$header = 'Список постов';

			if(count($_POST['delete']) > 1)
			{
				$message = 'Посты с id  = '.$posts.' удалены';
			}
			elseif(count($_POST['delete']) == 1)
			{
				$message = 'Пост с id  = '.$posts.' удален';
			}

			$message = '<div class="ok">'.$message.'</div>';
			$data = $this->model->GetList('*', '', 'id DESC', $GLOBALS['config']['post']['per_page'], $page);		
			$menuItems = $this->model->getArchive();
			$this->view->generate('postsAdmin_view.php', 'templates/templateAdmin_view.php', $data, 'menuAdmin_view.php', $menuItems, $header, $title, $message,'blank_view.php');
		}
		else
		{
			header('Location:/404');
		}	
	}
}
