<?php

// подключаем файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once '.config.php';

require_once 'core/route.php';
$Model = new Model;
$Model->connect();
Route::start(); 