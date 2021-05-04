-- CREATE DATABASE covid OWNER JOHAN;

CREATE TABLE COUNTRY (
    ID INT,
    COUNTRY_NAME VARCHAR(50)
);

CREATE SEQUENCE COUNTRY_ID_SEQ OWNED BY COUNTRY.ID;

ALTER TABLE COUNTRY ADD PRIMARY KEY (ID);
ALTER TABLE COUNTRY ALTER COLUMN ID SET DEFAULT NEXTVAL('COUNTRY_ID_SEQ');
ALTER TABLE COUNTRY ADD CONSTRAINT COUNTRY_NAME CHECK(LENGTH(COUNTRY_NAME) > 1);

CREATE TABLE REGION (
    ID INT,
    REGION_NAME VARCHAR(50),
    COUNTRY_ID INT
);

CREATE SEQUENCE REGION_ID_SEQ OWNED BY REGION.ID;

ALTER TABLE REGION ADD PRIMARY KEY (ID);
ALTER TABLE REGION ALTER COLUMN ID SET DEFAULT NEXTVAL('REGION_ID_SEQ');
ALTER TABLE REGION ADD CONSTRAINT REGION_NAME CHECK(LENGTH(REGION_NAME) > 1);
ALTER TABLE REGION ADD CONSTRAINT REGION_COUNTRY_fk FOREIGN KEY (COUNTRY_ID) REFERENCES COUNTRY (ID);

CREATE TYPE GENDER AS ENUM ('MALE', 'FEMALE', 'UNKNOWN');

CREATE TABLE TCASE (
    ID INT,
    REGION_ID INT,
    PEOPLE_NAME VARCHAR(100),
    AGE INT,
    GENDER GENDER
);

CREATE SEQUENCE CASE_ID_SEQ OWNED BY TCASE.ID;

ALTER TABLE TCASE ADD PRIMARY KEY (ID);
ALTER TABLE TCASE ALTER COLUMN ID SET DEFAULT NEXTVAL('CASE_ID_SEQ');
ALTER TABLE TCASE ADD CONSTRAINT TCASE_REGION_ID_fk FOREIGN KEY (REGION_ID) REFERENCES REGION (ID);
ALTER TABLE TCASE ADD CONSTRAINT TCASE_NAME_NAME CHECK(LENGTH(PEOPLE_NAME) > 3);
ALTER TABLE TCASE ADD CONSTRAINT TCASE_AGE CHECK(AGE > -1 AND AGE < 151);
ALTER TABLE TCASE ALTER COLUMN DATE SET NOT NULL;

CREATE TABLE EVOLUTION (
    ID INT,
    CASE_ID INT,
    DATE TIMESTAMP,
    DEAD BOOLEAN
);

CREATE SEQUENCE EVOLUTION_ID_SEQ OWNED BY EVOLUTION.ID;

ALTER TABLE EVOLUTION ADD PRIMARY KEY (ID);
ALTER TABLE EVOLUTION ALTER COLUMN ID SET DEFAULT NEXTVAL('EVOLUTION_ID_SEQ');
ALTER TABLE EVOLUTION ADD CONSTRAINT EVOLUTION_CASE_ID_fk FOREIGN KEY (CASE_ID) REFERENCES TCASE (ID);
ALTER TABLE EVOLUTION ALTER COLUMN DATE SET NOT NULL;
ALTER TABLE EVOLUTION ALTER COLUMN DEAD SET NOT NULL;
CREATE UNIQUE INDEX EVOLUTION_CASE_ID_UNIQUE ON EVOLUTION (CASE_ID);