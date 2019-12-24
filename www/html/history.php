<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'history.php';
require_once MODEL_PATH . 'history_details.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$user_type = get_user_type($db, $user['user_id']);
$histories = get_histories($db, $user_type, $user['user_id']);
$histories = entity_assoc_array($histories);

include_once '../view/history_view.php';