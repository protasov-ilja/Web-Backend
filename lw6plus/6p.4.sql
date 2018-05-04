/*4.(#20)  Необходимо создать таблицу студентов (поля id, name) и таблицу курсов (поля id, name). Каждый студент может
  посещать несколько курсов. Названия курсов и имена студентов - произвольны.
  Написать SQL запросы:*/

-- student
DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- curse
DROP TABLE IF EXISTS `curse`;
CREATE TABLE IF NOT EXISTS `curse` (
  `curse_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`curse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- student_in_curse
DROP TABLE IF EXISTS `student_in_curse`;
CREATE TABLE IF NOT EXISTS `student_in_curse` (
  `student_in_curse_id` INT(11) NOT NULL AUTO_INCREMENT,
  `curse_id` INT(11) NOT NULL,
  `student_id` INT(11) NOT NULL,
  PRIMARY KEY (`student_in_curse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- student
INSERT INTO `student` VALUE (NULL, 'Вася');
INSERT INTO `student` VALUE (NULL, 'Вася1');
INSERT INTO `student` VALUE (NULL, 'Вася2');
INSERT INTO `student` VALUE (NULL, 'Вася3');
INSERT INTO `student` VALUE (NULL, 'Вася4');
INSERT INTO `student` VALUE (NULL, 'Вася5');
INSERT INTO `student` VALUE (NULL, 'Вася6');

-- curse
INSERT INTO `curse` VALUE (NULL, 'курс');
INSERT INTO `curse` VALUE (NULL, 'курс1');
INSERT INTO `curse` VALUE (NULL, 'курс2');
INSERT INTO `curse` VALUE (NULL, 'курс3');
INSERT INTO `curse` VALUE (NULL, 'курс4');
INSERT INTO `curse` VALUE (NULL, 'курс5');
INSERT INTO `curse` VALUE (NULL, 'курс6');

-- student_in_curse
INSERT INTO `student_in_curse` VALUE (NULL, 1, 1);
INSERT INTO `student_in_curse` VALUE (NULL, 1, 2);
INSERT INTO `student_in_curse` VALUE (NULL, 1, 3);
INSERT INTO `student_in_curse` VALUE (NULL, 1, 4);
INSERT INTO `student_in_curse` VALUE (NULL, 1, 5);
INSERT INTO `student_in_curse` VALUE (NULL, 1, 6);
INSERT INTO `student_in_curse` VALUE (NULL, 2, 1);
INSERT INTO `student_in_curse` VALUE (NULL, 2, 2);
INSERT INTO `student_in_curse` VALUE (NULL, 2, 3);
INSERT INTO `student_in_curse` VALUE (NULL, 2, 4);
INSERT INTO `student_in_curse` VALUE (NULL, 2, 5);
INSERT INTO `student_in_curse` VALUE (NULL, 3, 1);
INSERT INTO `student_in_curse` VALUE (NULL, 4, 2);

-- 1. отобразить количество курсов, на которые ходит более 5 студентов
CREATE TEMPORARY TABLE tmp_tbl AS (
  SELECT student_in_curse.curse_id AS curse
  FROM `student_in_curse`
  GROUP BY student_in_curse.curse_id
  HAVING COUNT(student_in_curse.student_id) > 5
);

SELECT COUNT(tmp_tbl.curse) AS count_curse
FROM tmp_tbl;
DROP TABLE `tmp_tbl`;


-- 2. отобразить все курсы, на которые записан определенный студент.
SELECT student.name, GROUP_CONCAT(curse.name) AS curses
FROM `student_in_curse`
  LEFT JOIN `curse` ON curse.curse_id = student_in_curse.curse_id
  LEFT JOIN `student` ON student.student_id = student_in_curse.student_id
GROUP BY student_in_curse.student_id;