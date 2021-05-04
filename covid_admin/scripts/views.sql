CREATE VIEW V_REGION_COUNTRY AS
    SELECT R.*, C.COUNTRY_NAME
    FROM REGION R
    JOIN COUNTRY C ON R.COUNTRY_ID = C.ID;

CREATE VIEW V_ALL_CASES AS
    SELECT *
    FROM TCASE;

CREATE VIEW V_ALL_CASES_R AS
    SELECT C.*, R.REGION_NAME, R.COUNTRY_ID, R.COUNTRY_NAME
    FROM V_ALL_CASES C
    JOIN V_REGION_COUNTRY R ON C.REGION_ID = R.ID;

CREATE OR REPLACE VIEW V_CASES_EVOLUTION AS
    SELECT C.*, E.CASE_ID, E.DATE, E.DEAD
    FROM V_ALL_CASES_R C
    LEFT JOIN EVOLUTION E ON E.CASE_ID = C.ID;

CREATE OR REPLACE VIEW V_ACTIVE_CASES AS
    SELECT *
    FROM V_ALL_CASES_R
    WHERE ID NOT IN (SELECT CASE_ID FROM EVOLUTION);

CREATE OR REPLACE VIEW V_DEATH AS
    SELECT *
    FROM V_CASES_EVOLUTION
    WHERE DEAD = TRUE;

CREATE OR REPLACE VIEW V_RECOVERED AS
    SELECT *
    FROM V_CASES_EVOLUTION
    WHERE DEAD = FALSE;

CREATE OR REPLACE VIEW V_NB_CASES_COUNTRY AS
    SELECT COUNT(C.ID) NB_CASES, CO.ID, CO.COUNTRY_NAME
    FROM COUNTRY CO
    LEFT JOIN V_ALL_CASES_R C ON C.COUNTRY_ID = CO.ID
    GROUP BY CO.ID, CO.COUNTRY_NAME;

CREATE OR REPLACE VIEW V_NB_CASES_REGION AS
    SELECT COUNT(C.ID) NB_CASES, R.ID, R.REGION_NAME, R.COUNTRY_ID, R.COUNTRY_NAME
    FROM V_REGION_COUNTRY R
    LEFT JOIN V_ALL_CASES_R C ON C.REGION_ID = R.ID
    GROUP BY R.ID, R.REGION_NAME, R.COUNTRY_ID, R.COUNTRY_NAME;

CREATE OR REPLACE VIEW V_ACTIVE_CASES_COUNTRY AS
    SELECT COUNT(CA.ID) NB_ACTIVE_CASES, C.ID, C.COUNTRY_NAME
    FROM COUNTRY C
    LEFT JOIN V_ACTIVE_CASES CA ON CA.COUNTRY_ID = C.ID
    GROUP BY C.ID, C.COUNTRY_NAME;

CREATE OR REPLACE VIEW V_ACTIVE_CASES_REGION AS
    SELECT COUNT(CA.ID) NB_ACTIVE_CASES, R.ID, R.REGION_NAME, R.COUNTRY_ID, R.COUNTRY_NAME
    FROM V_REGION_COUNTRY R
    LEFT JOIN V_ACTIVE_CASES CA ON CA.REGION_ID = R.ID
    GROUP BY R.ID, R.REGION_NAME, R.COUNTRY_ID, R.COUNTRY_NAME;

CREATE OR REPLACE VIEW V_RECOVERED_COUNTRY AS
    SELECT COUNT(R.ID) NB_RECOVERED, C.ID, C.COUNTRY_NAME
    FROM COUNTRY C
    LEFT JOIN V_RECOVERED R ON R.COUNTRY_ID = C.ID
    GROUP BY C.ID, C.COUNTRY_NAME;

CREATE OR REPLACE VIEW V_RECOVERED_REGION AS
    SELECT COUNT(R.ID) NB_RECOVERED, RE.ID, RE.REGION_NAME, RE.COUNTRY_ID, RE.COUNTRY_NAME
    FROM V_REGION_COUNTRY RE
    LEFT JOIN V_RECOVERED R ON R.REGION_ID = RE.ID
    GROUP BY RE.ID, RE.REGION_NAME, RE.COUNTRY_ID, RE.COUNTRY_NAME;

CREATE OR REPLACE VIEW V_DEATH_COUNTRY AS
    SELECT COUNT(D.ID) NB_DEATH, C.ID, C.COUNTRY_NAME
    FROM COUNTRY C
    LEFT JOIN V_DEATH D ON D.COUNTRY_ID = C.ID
    GROUP BY C.ID, C.COUNTRY_NAME;

CREATE OR REPLACE VIEW V_DEATH_REGION AS
    SELECT COUNT(D.ID) NB_DEATH, R.ID, R.REGION_NAME, R.COUNTRY_ID, R.COUNTRY_NAME
    FROM V_REGION_COUNTRY R
    LEFT JOIN V_DEATH D ON D.REGION_ID = R.ID
    GROUP BY R.ID, R.REGION_NAME, R.COUNTRY_ID, R.COUNTRY_NAME;

CREATE OR REPLACE VIEW NB_CASE_COUNTRY AS
    SELECT C.*, AC.NB_ACTIVE_CASES, RC.NB_RECOVERED, DC.NB_DEATH
    FROM V_NB_CASES_COUNTRY C
    JOIN V_ACTIVE_CASES_COUNTRY AC ON AC.ID = C.ID
    JOIN V_RECOVERED_COUNTRY RC ON RC.ID = C.ID
    JOIN V_DEATH_COUNTRY DC ON DC.ID = C.ID;

CREATE OR REPLACE VIEW NB_CASE_REGION AS
    SELECT C.*, AC.NB_ACTIVE_CASES, RC.NB_RECOVERED, DC.NB_DEATH
    FROM V_NB_CASES_REGION C
    JOIN V_ACTIVE_CASES_REGION AC ON AC.ID = C.ID
    JOIN V_RECOVERED_REGION RC ON RC.ID = C.ID
    JOIN V_DEATH_REGION DC ON DC.ID = C.ID;

CREATE OR REPLACE VIEW SUM_CASE_COUNTRY AS
    SELECT SUM(NB_CASES) NB_CASES, SUM(NB_ACTIVE_CASES) NB_ACTIVE_CASES, SUM(NB_RECOVERED) NB_RECOVERED, SUM(NB_DEATH) NB_DEATH
    FROM NB_CASE_COUNTRY;

-- -----------------------------------------------------------------

CREATE OR REPLACE VIEW TCASE_MONTH AS
    SELECT C.*, DATE_PART('month', C.DATE) date_month
    FROM TCASE C;

CREATE OR REPLACE VIEW NB_CASE_MONTH AS
    SELECT COUNT(ID) NB_CASE, DATE_MONTH
    FROM TCASE_MONTH GROUP BY DATE_MONTH