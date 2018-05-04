# 7. (#10) Есть две таблицы:
# users - таблица с пользователями (users_id, name)
# orders - таблица с заказами (orders_id, users_id, status)

-- users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orders_id` INT(11) NOT NULL AUTO_INCREMENT,
  `users_id` INT(11) NOT NULL,
  `status` BOOLEAN NOT NULL,
  PRIMARY KEY (`orders_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- users
INSERT INTO `users` VALUE (NULL, 'name1');
INSERT INTO `users` VALUE (NULL, 'name2');
INSERT INTO `users` VALUE (NULL, 'name3');
INSERT INTO `users` VALUE (NULL, 'name4');
INSERT INTO `users` VALUE (NULL, 'name5');

-- orders
INSERT INTO `orders` VALUE (NULL, 1, 1);
INSERT INTO `orders` VALUE (NULL, 1, 1);
INSERT INTO `orders` VALUE (NULL, 1, 1);
INSERT INTO `orders` VALUE (NULL, 1, 1);
INSERT INTO `orders` VALUE (NULL, 1, 1);
INSERT INTO `orders` VALUE (NULL, 1, 0);
INSERT INTO `orders` VALUE (NULL, 2, 1);
INSERT INTO `orders` VALUE (NULL, 2, 1);
INSERT INTO `orders` VALUE (NULL, 2, 1);
INSERT INTO `orders` VALUE (NULL, 2, 1);
INSERT INTO `orders` VALUE (NULL, 2, 1);
INSERT INTO `orders` VALUE (NULL, 2, 1);
INSERT INTO `orders` VALUE (NULL, 3, 0);
INSERT INTO `orders` VALUE (NULL, 3, 0);
INSERT INTO `orders` VALUE (NULL, 4, 0);
INSERT INTO `orders` VALUE (NULL, 5, 1);

-- 1) Выбрать всех пользователей из таблицы users, у которых ВСЕ записи в таблице orders имеют status = 0
SELECT users.users_id, users.name, orders.status
FROM `orders`
  LEFT JOIN `users` ON users.users_id = orders.users_id
GROUP BY orders.users_id
  HAVING orders.status = 0;

-- 2) Выбрать всех пользователей из таблицы users, у которых больше 5 записей в таблице orders имеют status = 1
SELECT users.users_id, users.name, GROUP_CONCAT(orders.status) AS all_status, COUNT(orders.orders_id) AS orders_count
FROM `orders`
  LEFT JOIN `users` ON users.users_id = orders.users_id
WHERE orders.status = 1
GROUP BY orders.users_id
  HAVING COUNT(orders.orders_id) > 5;