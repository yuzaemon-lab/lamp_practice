<?php
function get_history($db, $history_id){
	$sql = "
	SELECT
		purchase_histories.history_id,
    sum(purchase_details.amount * purchase_details.purchased_price) as history_sum,
		purchase_histories.created
	FROM
		purchase_histories
	JOIN
    purchase_details
	ON
		purchase_histories.history_id = purchase_details.history_id
	WHERE
    purchase_histories.history_id = :history_id
  GROUP BY
    purchase_details.history_id
  ";
  
  $params = array(
    ':history_id' => $history_id
  );
  
	return fetch_query($db, $sql, $params);
}

function get_history_details($db, $history_id){
  $sql = "
    SELECT
      purchase_details.purchase_id,
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