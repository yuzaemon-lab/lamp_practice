<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <!-- <link rel="stylesheet" href="<?php print entity_str(STYLESHEET_PATH . 'cart.css'); ?>"> -->
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入履歴</h1>
  <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
    <?php if(count($histories) > 0){ ?>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
            <th>購入明細</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($histories as $history){ ?>
          <tr>
            <td><?php print entity_str($history['history_id']); ?></td>
            <td><?php print entity_str($history['created']); ?></td>
            <td><?php print entity_str(number_format($history['sum'])); ?>円</td>
            <td>
              <form method="get" action="<?php print entity_str(HISTORY_DETAILS_URL); ?>">
                <input type="submit" value="購入明細表示" class="btn btn-secondary">
                <input type="hidden" name="history_id" value="<?php print entity_str($history['history_id']); ?>">
              </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>購入履歴はありません。</p>
    <?php } ?> 
  </div>
</body>
</html>