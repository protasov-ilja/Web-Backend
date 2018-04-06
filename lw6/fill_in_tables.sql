INSERT INTO `dvd` (`dvd_id`, `title`, `production_year`) VALUES
  (1,'Film1', 2018),
  (2,'Film2',2010),
  (3,'Film3',2010),
  (4,'Film4',2010),
  (5,'Film5',2010),
  (6,'Film6',2010),
  (7,'Film7',2010),
  (8,'Film8',2010),
  (9,'Film9',2010),
  (10,'Film10',2010),
  (11,'Film11',2010),
  (12,'Film12',2013),
  (13,'Film13',2014),
  (14,'Film14',2015),
  (15,'Film15',2010);


INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `passport_code`, `registration_date`) VALUES
  (1,'FirstName1', 'LastName1', '1111-111111', '12-12-12'),
  (2,'FirstName2', 'LastName2', '2222-111111', '11-12-10'),
  (3,'FirstName3', 'LastName3', '3333-111111', '10-12-12'),
  (4,'FirstName4', 'LastName4', '4444-111111', '12-10-12'),
  (5,'FirstName5', 'LastName5', '5555-111111', '10-10-12'),
  (6,'FirstName6', 'LastName6', '6666-111111', '12-10-12'),
  (7,'FirstName7', 'LastName7', '7777-111111', '12-11-12'),
  (8,'FirstName8', 'LastName8', '8888-111111', '12-12-11'),
  (9,'FirstName9', 'LastName9', '9999-111111', '12-12-12'),
  (10,'FirstName10', 'LastName10', '1010-111111', '12-11-11'),
  (11,'FirstName11', 'LastName11', '1111-000000', '11-11-12'),
  (12,'FirstName12', 'LastName12', '1212-111111', '11-11-12'),
  (13,'FirstName13', 'LastName13', '1313-111111', '12-12-12'),
  (14,'FirstName14', 'LastName14', '1414-111111', '12-10-10'),
  (15,'FirstName15', 'LastName15', '1515-111111', '12-10-10'),
  (16,'FirstName16', 'LastName16', '1616-111111', '12-12-12');


INSERT INTO `offer` (`offer_id`, `dvd_id`, `customer_id`, `offer_date`, `return_date`) VALUES
  (1, 1, 1, '2011-12-12', '2011-12-22'),
  (2, 1, 2, '2017-12-22', NULL),
  (3, 2, 2, '2018-04-03', '2018-04-05'),
  (4, 3, 3, '2018-02-22', NULL),
  (5, 4, 4, '2018-01-22', NULL),
  (6, 5, 5, '2018-03-22', '2018-04-22'),
  (7, 6, 6, '2016-08-22', '2017-08-22'),
  (8, 7, 7, '2015-10-22', NULL),
  (9, 6, 3, '2018-04-24', NULL);

