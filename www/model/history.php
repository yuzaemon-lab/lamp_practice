<?php
function get_histories($db, $user_id){
  $sql = "
    SELECT
      purchase_histories.history_id,
      purchase_histories.created
    FROM
      purchase_histories
    JOIN
      purchase_details
    ON
      purchase_histories.history_id = purchase_details.history_id
  ";

  // 管理者以外は自分の購入した商品のみ閲覧可能。
  if($user_id !== USER_TYPE_ADMIN){
    $sql .= "
      WHERE
        purchase_histories.user_id = :user_id
    ";
    $params = array(
      ':user_id' => $user_id
    );
  }

  $sql .= "
    GROUP BY
      purchase_histories.history_id
    ORDER BY
      created
    DESC
  ";
  
  return fetch_all_query($db, $sql, $params);
}