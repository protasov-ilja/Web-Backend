-- 4.#10 Подготовьте SQL запрос получения списка всех DVD, год выпуска которых 2010,
-- отсортированных в алфавитном порядке по названию DVD.
SELECT dvd.title
FROM `dvd`
  WHERE dvd.production_year = 2010
  ORDER BY dvd.title;

-- 5.#10 Подготовьте SQL запрос для получения списка DVD дисков, которые в настоящее время находятся у клиентов.
SELECT dvd.title
FROM `offer`
  LEFT JOIN `dvd` ON dvd.dvd_id = offer.dvd_id
WHERE offer.return_date IS NULL;

-- 6.#10 Напишите SQL запрос для получения списка клиентов, которые брали какие-либо DVD
-- диски в текущем году. В результатах запроса необходимо также отразить какие диски брали клиенты.
SELECT customer.customer_id, customer.first_name, customer.last_name, dvd.title
FROM `offer`
  LEFT JOIN `customer` ON customer.customer_id = offer.customer_id
  LEFT JOIN `dvd` ON dvd.dvd_id = offer.dvd_id
  WHERE offer.offer_date BETWEEN '2018-01-01' AND '2018-12-31';