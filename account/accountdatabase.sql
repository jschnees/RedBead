/*tables and test data for RedBead*/
drop database if exists RedBead;
create database if not exists RedBead;

use RedBead;

CREATE TABLE IF NOT EXISTS  Customer(
CustomerID 		INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
FirstName       VARCHAR(100)    NOT NULL,
LastName        VARCHAR(10)     NOT NULL,
HomePhone       VARCHAR(10)     NOT NULL,
EMAIL           VARCHAR(50)    	NOT NULL,
username 		VARCHAR(100)    NOT NULL,
password		VARCHAR(30) 	NOT NULL
);

CREATE TABLE IF NOT EXISTS TripInformation (
TripStartDate	VARCHAR(10),
TripEndDate		VARCHAR(10)
);

insert into `TripInformation` (TripStartDate, TripEndDate)
values	('2019-04-12','2019-04-18'),
		('2019-05-19','2019-05-25'),
		('2019-07-21','2019-07-27');

CREATE TABLE IF NOT EXISTS  CreditCardInformation (
creditCardID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
CustomerFullName  VARCHAR(100),
cardNumber 	  	  INT(16),
ExpMonth 	      INT(2),
ExpYear 	      INT(3),
CVVNumber 	      INT(4)
);
 
CREATE TABLE IF NOT EXISTS Invoice(
InvoiceDate			VARCHAR(10),
InvoiceDescription	VARCHAR(255),
Price				VARCHAR(100),
Total				VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS Payment(
ParmentID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
PaymentDate date not null,
PaymentAmount VARCHAR (100) NOT NULL
);

CREATE TABLE IF NOT EXISTS Product(
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
ProductName		VARCHAR(255) NOT NULL,
image			VARCHAR(255) NOT NULL,
ProductDescription VARCHAR(255) NOT NULL,
ProductPrice	double
);

INSERT INTO `Product` (id, ProductName, ProductPrice, image, ProductDescription)
VALUES
(1, 'VIP All Included', 999.99, 'assets/img/p1.jpg', 
'All Packages Included
Mental Health and Counseling
Career Coaching
Nutrition Counseling
'
),
(2, 'Counseling', 699.99, 'assets/img/p2.jpeg',
'Individual counseling, Family counseling, Marriage and relationship counseling, Group therapy, Community support services
'
),
(3, 'Career Coaching ', 299.99, 'assets/img/p3.jpg',
'Performance assessment, Leadership development, Personality assessment'),
(4, 'Nutrition Couseling', 499.99, 'assets/img/p4.jpg',
'Pre-program nutrition and fitness consultations, All meals and snacks provided by the Wellness Kitchen');

CREATE TABLE IF NOT EXISTS Promotion(
CurrentPromotion       VARCHAR(255)
);

INSERT INTO `Promotion` (CurrentPromotion)
VALUES ('Two Free massage sessions while on board');

CREATE TABLE IF NOT EXISTS ItemName(
ItemName		VARCHAR(255) NOT NULL);
select * from ItemName;