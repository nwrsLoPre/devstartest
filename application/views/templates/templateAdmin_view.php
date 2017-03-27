<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Cetera Templates
http://www.cetera.ru

Name       : Test
Description: Simply test theme.

Modified by BalandinDS
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title><?=$title;?></title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css" />
	<script src="../js/jquery-1.6.2.js" type="text/javascript"></script>
</head>
<body>
	<header>
        <?php include 'application/views/'.'header_view.php'; ?>
	</header>

	<section>
		<article>
			<?= $message; ?>
			<?php include '/application/views/'.$content_view; ?>
		</article>

		<aside>
		    <?php include '/application/views/'.$menu_view; ?>
	  	</aside>
	</section>
	<section>
			<?php include '/application/views/'.$pagination_view; ?>
		<aside>
		 
		</aside>
	</section>

	<footer>
        <?php include 'application/views/'.'footer_view.php'; ?>
	</footer>
<script type="text/javascript" src="http://yandex.st/jquery/2.0.3/jquery.min.js"></script>
<script src="../js/admin.js" type="text/javascript"></script>
</body>
</html>