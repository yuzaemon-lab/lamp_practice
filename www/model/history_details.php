<?php
function get_history($db, $history_id, $user_id){
	$sql = "
	SELECT
		purchase_histories.history_id,
		purchase_histories.user_id,
		purchase_histories.created
	FROM
		purchase_histories
	JOIN
		purchased_carts
	ON
		purchase_histories.history_id = purchased_carts.history_id
	WHERE
    purchase_histories.history_id = :history_id
  ";
  
  $params = array(
    ':history_id' => $history_id
  );

  if($user_id !== USER_TYPE_ADMIN){
    $sql .= "
    AND
      purchase_histories.user_id = :user_id
    ";
    
    $params = array(
      ':user_id' => $user_id
    );

  }
  
  $sql .= "
    GROUP BY
      purchase_histories.history_id
	";
	return fetch_query($db, $sql, $params);
}
function get_history_details($db, $history_id){
  $sql = "
    SELECT
      purchase_details.purchased_id,
      purchase_details.history_id,
      purchase_details.amount,
      purchase_details.created,
      items.name,
      items.price
    FROM
      purchase_details
    JOIN 
      items 
    ON 
      purchase_details.item_id = items.item_id
    WHERE
      purchase_details.history_id = :history_id
  ";

  $params = array(
    ':history_id' => $history_id
  );

  return fetch_all_query($db, $sql, $params);
  
}