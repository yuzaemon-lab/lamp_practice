<?php
require_once '../conf/const.php';
require_once '../model/functions.php';
require_once '../model/user.php';
require_once '../model/item.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$items = get_open_items($db);
$items = entity_assoc_array($items);

$rankings = get_ranking_items($db);
$rankings = entity_assoc_array($rankings);

include_once '../view/index_view.php';