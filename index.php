<?php
require_once('includes/constants.php');
require_once('includes/Main.php');

$helper = new Main();

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if($page <= 0) $page = 1;

$shipsData = $helper::getShipsData($page);
$ships = (isset($shipsData['results'])) ? $shipsData['results'] : [];

$shipsCount = (isset($shipsData['count'])) ? $shipsData['count'] : 0;
$pagesAvailable = ceil($shipsCount / ITEMS_PER_PAGE);


// pagination values
$nextJsonPage = (isset($shipsData['next'])) ? $shipsData['next'] : '';
$nextPageNum = $helper::getPageNum($nextJsonPage, true);
$previousJsonPage = (isset($shipsData['previous'])) ? $shipsData['previous'] : '';
$previousPageNum = $helper::getPageNum($previousJsonPage, false, $shipsCount);

require_once('views/layout.php');