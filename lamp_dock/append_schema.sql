-- ホスト: mysql
-- 生成日時: 2019 年 8 月 16 日 06:28
-- サーバのバージョン： 5.7.27
-- PHP のバージョン: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- データベース: `sample`
--

  
-- 購入履歴のテーブル
CREATE TABLE `purchase_histories` (
    `history_id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`history_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 購入された商品の詳細のテーブル
CREATE TABLE `purchase_details` (
    `purchase_id` INT(11) NOT NULL AUTO_INCREMENT,
    `history_id` INT(11) NOT NULL,
    `item_id` INT(11) NOT NULL,
    `amount` INT(11) NOT NULL,
    `purchased_price` INT(11) NOT NULL,
    `created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`purchase_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    -- 