<?php
declare(strict_types = 1); // Si se utiliza la primera línea

require_once('config.php');
require_once(MODELS.'Page.php');
require_once(MODELS.'Compra.php');
session_start();






require_once(VIEWS.'header.php');
require_once(VIEWS.'menu.php');
require_once(Page::pageRequest($_REQUEST['page']??'home', VIEWS));
require_once(VIEWS.'footer.php');