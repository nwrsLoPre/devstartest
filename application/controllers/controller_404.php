<?php
class Controller_404 extends Controller
{
	function action_index()
	{
	    $header = 'Запрашиваемая страница не найдена';
	    $title = 'Запрашиваемая страница не найдена';
	    $data = '';
		$this->view->generate('404_view.php', 'template_view.php', $data, 'blank_view.php', '', $header, $title, '','blank_view.php');
	}
}
