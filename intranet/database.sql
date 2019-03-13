/*tables and test data for RedBead*/
drop database if exists RedBeadEmployeeData;
create database if not exists RedBeadEmployeeData;
use RedBeadEmployeeData;

CREATE TABLE EmployeeData(
EmployeeID 		INT PRIMARY KEY NOT NULL auto_increment,
FirstName       VARCHAR(100)    NOT NULL,
LastName        VARCHAR(10)     NOT NULL,
HomePhone       VARCHAR(10)     NOT NULL,
EMPAddress		VARCHAR(100)    NOT NULL,
City			VARCHAR(100)    NOT NULL,
StateProvince   VARCHAR(100)    NOT NULL,
ZipCode			VARCHAR(10)		NOT NULL,
EMAIL           VARCHAR(50)    	NOT NULL,
username 		VARCHAR(15)    NOT NULL,
password 		VARCHAR(100) 	NOT NULL
);

CREATE TABLE Payroll(
CheckID 		INT PRIMARY KEY NOT NULL auto_increment,
Amount          VARCHAR(100)    NOT NULL,
Tax		        INT(1)     	DEFAULT '0',
Insurance		VARCHAR(30)		DEFAULT '60'
);

/* data for accounting */
INSERT INTO `Payroll`(Amount) 
VALUES	('$1000');
INSERT INTO `Payroll`(Amount) 
VALUES	('$1000');
INSERT INTO `Payroll`(Amount) 
VALUES	('$1000');

CREATE TABLE Benefits(
BenefitsID  				INT PRIMARY KEY NOT NULL auto_increment,
InsurancePlan	    		VARCHAR(100)    DEFAULT 'PPO Plan 1',
InsurancePlanPolicy			VARCHAR(30)		DEFAULT 'includes/PPOPlan1.pdf',
VacationDays		        CHAR(2)     	DEFAULT '10',
SickDays			        CHAR(1)     	DEFAULT '5',
JustBecauseDays				CHAR(1)			DEFAULT '5',
RetirementPlanCo			VARCHAR(30)		DEFAULT 'Merrill Lynch',
RetirementPlanLink			VARCHAR(30)		DEFAULT 'https://www.ml.com/'
);
INSERT INTO `Benefits`(InsurancePlan) 
VALUES	('PPO Plan 1');

CREATE TABLE CompanyBlog(
ArticleID  				INT PRIMARY KEY  NOT NULL auto_increment,
ArticleTitle			VARCHAR(150)    NOT NULL,
Article					VARCHAR(1000)    NOT NULL
);

INSERT INTO `CompanyBlog`(ArticleTitle, Article) 
VALUES	('Halloween Party October 31st', 
'Wear your Halloween Costume (Office Appropriate) to work on October 31st and enter to win prizes!'
),('Month of Celebration!', 
'The company will be closed from December 1st to January 7th. This is our major down time. Not much can be accomplished during this time so we take the entire month off until after New Years. Enjoy the paid holiday!'
);