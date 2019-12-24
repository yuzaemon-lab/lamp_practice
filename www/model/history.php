<?php
function get_histories($db, $user_type){
  $sql = "
    SELECT
      purchase_histories.history_id,
      sum(purchase_details.amount * purchase_details.purchased_price) as total_price,
      purchase_histories.created
    FROM
      purchase_histories
    JOIN
      purchase_details
    ON
      purchase_histories.history_id = purchase_details.history_id
  ";

  // 管理者以外は自分の購入した商品のみ閲覧可能。
  if($user_type !== USER_TYPE_ADMIN){
    $sql .= "
      WHERE
        purchase_histories.user_type = :user_type
    ";
    
    $params = array(
      ':user_type' => $user_type
    );
  }

  $sql .= "
  GROUP BY
    purchase_details.history_id
  ";
  
  return fetch_all_query($db, $sql, $params);
}


function get_user_type($db, $user_id) {
  $sql = '
    SELECT
      type
    FROM
      users
    WHERE
      user_id = :user_id
  ';

  $params = array(
    ':user_id' => $user_id
  );

  $result = fetch_all_query($db, $sql, $params);
  return (int)$result[0]['type'];
}