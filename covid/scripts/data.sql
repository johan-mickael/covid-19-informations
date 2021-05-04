INSERT INTO COUNTRY (COUNTRY_NAME) VALUES
('MADAGASCAR'),
('INDE'),
('AMERIQUE');

INSERT INTO REGION (REGION_NAME, COUNTRY_ID) VALUES
('ANALAMANGA', 1),
('BOENY', 1),
('INDE', 2),
('AMERIQUE', 3);

INSERT INTO TCASE (REGION_ID, PEOPLE_NAME, AGE, GENDER) VALUES
(1, 'case 1', 60, 'MALE'),
(1, 'case 2', 60, 'MALE'),
(1, 'case 3', 60, 'MALE'),
(2, 'case 4', 60, 'MALE'),
(2, 'case 5', 60, 'MALE'),
(2, 'case 6', 60, 'FEMALE'),
(2, 'case 7', 60, 'MALE'),
(3, 'case 8', 60, 'FEMALE'),
(3, 'case 9', 60, 'MALE');

INSERT INTO EVOLUTION (CASE_ID, DATE, DEAD) VALUES
(1, CURRENT_TIMESTAMP, FALSE),
(8, CURRENT_TIMESTAMP, TRUE),
(9, CURRENT_TIMESTAMP, TRUE);