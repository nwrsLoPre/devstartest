<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
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
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
</head>
<body>
	<header>
        <?php include 'application/views/'.'header_view.php'; ?>
	</header>

	<section>
		<article>
			<?= $message; ?>
			<?php include 'application/views/'.$content_view; ?>
			<?php include 'application/views/'.$pagination_view; ?>
		</article>

		<aside>
		    <?php include 'application/views/'.$menu_view; ?>
	  	</aside>
	</section>

	<footer>
        <?php include 'application/views/'.'footer_view.php'; ?>
	</footer>

    <script src="../js/form_feedback.js" type="text/javascript"></script>
</body>
</html>