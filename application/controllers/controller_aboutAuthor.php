<?php
class Controller_aboutAuthor extends Controller
{
	function __construct()
	{
		$this->model = new Model_Posts();
		$this->view = new View();
		$menu = new View();
	}

	function action_index()
	{
        $title = 'Страница об авторе блога';
        $header = 'Страница об авторе блога';

        $data = 'Привет, меня зовут Баландин Денис,<br><br>'.
        'я - автор и разработчик блога DevStar ( тестовый проект ),<br>'.
        'который был создан в рамках выполнения тестового задания,<br>'.
        'для проверки навыков работы с основными технологиями в web-разработке<br><br>'.
        'Чтобы связаться со мной, пишите мне на e-mail: nwrs.lopre@mail.ru';

        $menuItems = $this->model->getArchive();
        $this->view->generate('aboutAuthor_view.php', 'template_view.php', $data, 'menu_view.php', $menuItems, $header, $title, '','blank_view.php');
	}
}
