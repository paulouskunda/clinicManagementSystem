-- Not Working
Select (Select count(*) from patients where gender='Male') AS Male,
(Select count(*) from patients where gender='Female') AS Female, (SELECT COUNT(*) FROM patients WHERE age < 18 ) AS 
Children FROM patients, activelog WHERE activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-15'


SELECT  (Select count(*) from patients where gender='Male') AS Male,
(Select count(*) from patients where gender='Female') AS Female, (SELECT COUNT(*) FROM patients WHERE age < 18 ) AS 
Children FROM activelog INNER JOIN (
	Select (Select count(*) from patients where gender='Male') AS Male,
(Select count(*) from patients where gender='Female') AS Female, (SELECT COUNT(*) FROM patients WHERE age < 18 ) AS 
Children    
)AS P


SELECT (Select count(*) from patients where gender='Male') AS Male, (Select count(*) from patients where gender='Female') AS Female, (SELECT COUNT(*) FROM patients WHERE age < 18 ) AS Children
FROM patients INNER JOIN (SELECT * from activelog WHERE activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-5' ) as a ON patients.uniqueID  = a.pUniqueID


SELECT * from activelog  
 INNER JOIN (
     		SELECT
     		(Select count(*) from patients where gender='Male') AS Male,
             (Select count(*) from patients where gender='Female') AS Female, 
             (SELECT COUNT(*) FROM patients WHERE age < 18 ) AS Children, uniqueID
			FROM patients) as p ON  activelog.pUniqueID = p.uniqueID 
            WHERE activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-5'

--Not displaying anything
Select (Select count(*) from patients where gender='Male') AS Male, (Select count(*) from patients where gender='Female') AS Female, (SELECT COUNT(*) FROM patients WHERE age < 18 ) AS Children
FROM patients as p 
WHERE p.uniqueID IN (SELECT activelog.cpDate FROM activelog WHERE activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-15')


SELECT activelog.cpDate, (Select DISTINCT(count(*)) from patients where patients.gender='Male') AS Male, 
(Select count(*) from patients where gender='Female') AS Female 
FROM activelog, patients WHERE activelog.pUniqueID = patients.uniqueID AND activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-15'
AND patients.gender = (Select count(*) from patients where patients.gender='Male') OR 
patients.gender = (Select count(*) from patients where patients.gender='Female')


-- Working
Select (Select count(*) from patients where gender='Male') AS Male, (Select count(*) from patients where gender='Female') AS Female, (SELECT COUNT(*) FROM patients WHERE age < 18 ) AS Children

SELECT 
(Select count(activelog.pUniqueID) from activelog, patients where patients.gender='Male' AND patients.uniqueID = activelog.pUniqueID AND activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-5') AS Male,
(Select count(activelog.pUniqueID) from activelog, patients where patients.gender='Female' AND patients.uniqueID = activelog.pUniqueID AND activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-5') AS Female,
COUNT(activelog.pUniqueID) AS TOTAL FROM activelog WHERE activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-5'


SELECT 
(Select count(activelog.pUniqueID) from activelog, patients where patients.gender='Male' AND patients.uniqueID = activelog.pUniqueID AND activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-15') AS Male,
(Select count(activelog.pUniqueID) from activelog, patients where patients.gender='Female' AND patients.uniqueID = activelog.pUniqueID AND activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-15') AS Female,
(Select count(activelog.pUniqueID) from activelog, patients where patients.age < 18 AND patients.uniqueID = activelog.pUniqueID AND activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-15') AS Children,
COUNT(activelog.pUniqueID) AS TOTAL FROM activelog WHERE activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-15'

SELECT 
(Select count(diseaserecord.pID) from diseaserecord, patients where patients.gender='Male' AND patients.uniqueID = diseaserecord.pID ) AS Male,
(Select count(diseaserecord.pID) from diseaserecord, patients where patients.gender='Female' AND patients.uniqueID = diseaserecord.pID ) AS Female,
(Select count(diseaserecord.pID) from diseaserecord, patients where patients.age < 18 AND patients.uniqueID = diseaserecord.pID ) AS Children

SELECT 
(Select count(diseaserecord.pID) from diseaserecord, patients where patients.gender='Male' AND patients.uniqueID = diseaserecord.pID  AND diseaserecord.diseaseName = 'Flu') AS Male,
(Select count(diseaserecord.pID) from diseaserecord, patients where patients.gender='Female' AND patients.uniqueID = diseaserecord.pID  AND diseaserecord.diseaseName = 'Flu') AS Female,
(Select count(diseaserecord.pID) from diseaserecord, patients where patients.age < 18 AND patients.uniqueID = diseaserecord.pID AND diseaserecord.diseaseName = 'Flu' ) AS Children

SELECT diseaserecord.diseaseName, COUNT(diseaserecord.diseaseName) AS TOTALNUMBER FROM diseaserecord, activelog
WHERE activelog.cpDate BETWEEN '2020-04-02' AND '2020-04-5' 
GROUP BY diseaserecord.diseaseName ORDER BY  COUNT(diseaserecord.diseaseName) DESC