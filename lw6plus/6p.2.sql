/*2. (#30) Есть таблица следующего вида:
CREATE TABLE track_downloads (
download_id BIGINT(20) NOT NULL AUTO_INCREMENT,
track_id INT NOT NULL,
user_id BIGINT(20) NOT NULL,
download_time TIMESTAMP NOT NULL DEFAULT 0,

PRIMARY KEY (download_id)
);*/

DROP TABLE IF EXISTS `track_downloads`;
CREATE TABLE IF NOT EXISTS `track_downloads` (
  `download_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `track_id` INT NOT NULL,
  `user_id` BIGINT(20) NOT NULL,
  `download_time` TIMESTAMP NOT NULL DEFAULT NOW(),
  PRIMARY KEY (`download_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `track_downloads` VALUE (NULL, 1, 1, '2010-11-19');
INSERT INTO `track_downloads` VALUE (NULL, 1, 2, '2010-11-19');
INSERT INTO `track_downloads` VALUE (NULL, 1, 3, '2010-11-18');
INSERT INTO `track_downloads` VALUE (NULL, 2, 1, '2010-11-19');
INSERT INTO `track_downloads` VALUE (NULL, 3, 2, '2010-11-19');
INSERT INTO `track_downloads` VALUE (NULL, 4, 5, '2010-11-19');
INSERT INTO `track_downloads` VALUE (NULL, 5, 4, '2010-11-20');

/*Напишите SQL-запрос, возвращающий все пары (download_count, user_count),
удовлетворяющие следующему условию:
user_count — общее ненулевое число пользователей, сделавших
ровно download_count скачиваний 19 ноября 2010 года.*/
CREATE TEMPORARY TABLE tmp_table AS (
  SELECT track_downloads.user_id AS user, COUNT(track_downloads.track_id) AS d_count
    FROM `track_downloads`
  WHERE track_downloads.download_time = '2010-11-19'
  GROUP BY track_downloads.user_id
    HAVING COUNT(track_downloads.track_id) > 0
);

SELECT COUNT(tmp_table.user) AS user_count, tmp_table.d_count AS download_count
FROM `tmp_table`
  GROUP BY tmp_table.d_count;

DROP TABLE `tmp_table`;