/* 1. (#15)  Table "PC"
id   cpu(MHz)      memory(Mb)       hdd(Gb)
1      1600          2000             500
2      2400          3000             800
3      3200          3000             1200
4      2400          2000             500
*/

-- лежит в БД rental
DROP TABLE IF EXISTS `pc`;
CREATE TABLE IF NOT EXISTS `pc` (
  `pc_id` INT(11) NOT NULL AUTO_INCREMENT,
  `cpu` INT(11) UNSIGNED NOT NULL,
  `memory` INT(11) UNSIGNED NOT NULL,
  `hdd` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `pc` VALUE (1, 1600, 2000, 500);
INSERT INTO `pc` VALUE (2, 2400, 3000, 800);
INSERT INTO `pc` VALUE (3, 3200, 3000, 1200);
INSERT INTO `pc` VALUE (4, 2400, 2000, 500);

-- 1) Тактовые частоты CPU тех компьютеров, у которых объем памяти 3000 Мб. Вывод: id, cpu, memory
SELECT pc.pc_id, pc.cpu, pc.memory
FROM `pc`
  WHERE pc.memory = 3000;

-- 2) Минимальный объём жесткого диска, установленного в компьютере на складе. Вывод: hdd
SELECT MIN(pc.hdd)
FROM `pc`;

-- 3) Количество компьютеров с минимальным объемом жесткого диска, доступного на складе. Вывод: count, hdd
SELECT COUNT(pc.hdd) AS count, MIN(pc.hdd) AS hdd
FROM `pc`
GROUP BY pc.hdd
LIMIT 1;
