<?php
require_once('includes/constants.php');
require_once('includes/Main.php');

// main helper object
$helper = new Main();

// get page number, default = 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if($page <= 0) $page = 1;

// get json data 
$shipsData = $helper::getShipsData($page);
$ships = (isset($shipsData['results'])) ? $shipsData['results'] : [];

$shipsJson = $helper::getJsonShipsData($ships);
$shipsCount = (isset($shipsData['count'])) ? $shipsData['count'] : 0;
$pagesAvailable = ceil($shipsCount / ITEMS_PER_PAGE);


// pagination values
$nextJsonPage = (isset($shipsData['next'])) ? $shipsData['next'] : '';
$nextPageNum = $helper::getPageNum($nextJsonPage, true);
$previousJsonPage = (isset($shipsData['previous'])) ? $shipsData['previous'] : '';
$previousPageNum = $helper::getPageNum($previousJsonPage, false, $shipsCount);

require_once('views/layout.php');