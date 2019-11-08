-- 5. (5#) Может ли значение в столбце(ах), на который наложено ограничение foreign key, равняться null? Привидите пример.
-- Ответ: Может, если на столбец не наложено ограничение not null
DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `book_id` INT(11) NOT NULL AUTO_INCREMENT,
  `writer_id` INT(11) DEFAULT NULL,
  `name` VARCHAR(100) NOT NULL,
  `year` YEAR NOT NULL,
  PRIMARY KEY (`book_id`),
  FOREIGN KEY (writer_id) REFERENCES `writer`(writer_id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `book` VALUE (NULL, 1, 'name1', 1990);
INSERT INTO `book` VALUE (NULL, 2, 'name2', 1991);
INSERT INTO `book` VALUE (NULL, 3, 'name3', 1992);
INSERT INTO `book` VALUE (NULL, 4, 'name4', 1993);
INSERT INTO `book` VALUE (NULL, NULL, 'name5', 1994);

DROP TABLE IF EXISTS `writer`;
CREATE TABLE IF NOT EXISTS `writer` (
  `writer_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `surname` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`writer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `writer` VALUE (NULL, 'writerName1', 'writerSurname1');
INSERT INTO `writer` VALUE (NULL, 'writerName2', 'writerSurname2');
INSERT INTO `writer` VALUE (NULL, 'writerName3', 'writerSurname3');
INSERT INTO `writer` VALUE (NULL, 'writerName4', 'writerSurname4');

UPDATE `book`
SET writer_id = NULL
WHERE
  book_id = 1;

-- 6. (#15) Как удалить повторяющиеся строки с использованием ключевого слова Distinct?
-- Приведите пример таблиц с данными и запросы.

-- films
DROP TABLE IF EXISTS `singer_and_song`;
CREATE TABLE IF NOT EXISTS `singer_and_song` (
  `singer_and_song_id` INT(11) NOT NULL AUTO_INCREMENT,
  `singer` VARCHAR(100) NOT NULL,
  `song` VARCHAR(100) NOT NULL,
  `year` YEAR NOT NULL,
  PRIMARY KEY (`singer_and_song_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


INSERT INTO `singer_and_song` VALUE (NULL, 'Scorpions', 'Wind of change', 1990);
INSERT INTO `singer_and_song` VALUE (NULL, 'Eagles', 'Hotel in California', 1976);
INSERT INTO `singer_and_song` VALUE (NULL, 'AC/DC', 'Thunderstruck', 1990);
INSERT INTO `singer_and_song` VALUE (NULL, 'AC/DC', 'Highway to hell', 1979);
INSERT INTO `singer_and_song` VALUE (NULL, 'AC/DC', 'Back in black', 1980);
INSERT INTO `singer_and_song` VALUE (NULL, 'Linkin Park', 'Numb', 2003);
INSERT INTO `singer_and_song` VALUE (NULL, 'Linkin Park', 'Breaking The Habit', 2003);
INSERT INTO `singer_and_song` VALUE (NULL, 'Skillet', 'Feel Invincible', 2016);

-- Выбрать всех исполнителей в алфамитном порядке, без повторов
-- distinct удаляет все повторы из временной таблицы
SELECT DISTINCT singer_and_song.singer
FROM `singer_and_song`
  ORDER BY singer_and_song.singer ASC;

-- выбрать количество уникальных исполнителей в таблице
SELECT DISTINCT COUNT(DISTINCT singer_and_song.singer) AS count_singers
FROM `singer_and_song`;