<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
  <!-- <link rel="stylesheet" href="<?php print entity_str(STYLESHEET_PATH . 'cart.css'); ?>"> -->
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入明細</h1>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
		<p>注文番号<?php print entity_str($history['history_id']); ?></p>
		<p>購入日時<?php print entity_str($history['created']); ?></p>
    <table class="table table-bordered">
		<thead class="thead-light">
			<tr>
				<th>商品名</th>
				<th>購入時の商品価格</th>
				<th>購入数</th>
				<th>小計</th>
			</tr>
		</thead>
		<tbody>     
			<?php foreach($history_details as $history_detail){ ?>
				<tr>
				<td><?php print entity_str($history_detail['name']); ?></td>
				<td><?php print entity_str($history_detail['price']); ?></td>
				<td><?php print entity_str($history_detail['amount']); ?></td>
				<td><?php print entity_str(number_format($history_detail['price'] * $history_detail['amount'])); ?>円</td>
				</tr>
			<?php } ?>
		</tbody>
		</table>
		<p class="text-right">合計金額<?php print entity_str(number_format($history['sum'])); ?>円</p>
  </div>
</body>
</html>