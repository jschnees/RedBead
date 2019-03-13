/*tables and test data for CustomerFeedBack*/
drop database if exists CustomerFeedBack;
create database if not exists CustomerFeedBack;
use CustomerFeedBack;

create table CustomerFeedBackTable(
ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
FirstName VARCHAR(30) NOT NULL,
LastName VARCHAR(30) NOT NULL,
EMAIL VARCHAR(30) NOT NULL,
FeedbackText VARCHAR(300) NOT NULL
);

SELECT * FROM CustomerFeedBackTable