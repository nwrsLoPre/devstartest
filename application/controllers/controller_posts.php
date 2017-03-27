<?php
class Controller_Posts extends Controller
{
	function __construct()
	{
		$this->model = new Model_Posts();
		$this->view = new View();
		$menu = new View();
	}

	function action_index()
	{
		$monthNames = array(1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь');
		$year = $_GET['year'];
		$month = $_GET['month'];
		$page = 0;

		if(isset($_GET['page']))
		{
			$page = $_GET['page'];
		}

		$countObjects = $this->model->GetCountId($year, $month);
		$objectsPerPage = $GLOBALS['config']['post']['per_page'];

		if(($countObjects % $objectsPerPage) == 0)
		{
			$countPages = round($countObjects / $objectsPerPage);
		}
		else
		{
			$countPages = floor($countObjects / $objectsPerPage) + 1;
		}

		if($page < $countPages){
			$nextPage = $page + 1;
		}
		elseif ($page == $countPages) {
			$nextPage = null;
		}

		if($page > 1){
			$prevPage = $page - 1;
		}
		elseif ($page == 1) {
			$prevPage = null;
		}

		$pagination['thisPage'] = $page;
		$pagination['countPages'] = $countPages;
		$pagination['objectsPerPage'] = $objectsPerPage;
		$pagination['prevPage'] = $prevPage;
		$pagination['nextPage'] = $nextPage;
		$pagination['firstPage'] = 1;
		$pagination['lastPage'] = $countPages;

		$pagination['year'] = $year;
		$pagination['month'] = $month;

		if(($year >= 2016 AND $year <= date('Y')) && (($month >= 1) && ($month <= 12)))
		{
			$pagination['filterParams'] = '&year='.$year.'&month='.$month;
		}
		else
		{
			$pagination['filterParams'] = '';
		}
		
		if(isset($year) && isset($month))
		{
			if(($year >= 2016 AND $year <= date('Y')) && (($month >= 1) && ($month <= 12)))
			{
				$title = 'Архив постов. '.$monthNames[$month].$year;
				$header = 'Архив постов. '.$monthNames[$month].$year;
				$data = $this->model->GetList('*', 'DATE_FORMAT(date, "%Y") = '.$year.' AND DATE_FORMAT(date, "%c") = ' . $month, 'id DESC', $GLOBALS['config']['post']['per_page'], $page);
				$menuItems = $this->model->getArchive();
				$this->view->generate('posts_view.php', 'template_view.php', $data, 'menu_view.php', $menuItems, $header, $title, '', 'paginationPosts_view.php', $pagination);
			}
			else
			{
				header('Location:/404');
			}
		}
		else
		{
			$title = 'Блог гениального автора';
			$header = 'Блог гениального автора';
			$data = $this->model->GetList('*', '', 'id DESC', $GLOBALS['config']['post']['per_page'], $page);		
			$menuItems = $this->model->getArchive();
			$this->view->generate('posts_view.php', 'template_view.php', $data, 'menu_view.php', $menuItems, $header, $title, '', 'paginationPosts_view.php', $pagination);
		}
	}
}
