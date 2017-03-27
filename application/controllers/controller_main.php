<?php
class Controller_Main extends Controller
{
	function action_index()
	{	
		// заглушка
		header('Location: /posts');
		exit;
	}
}