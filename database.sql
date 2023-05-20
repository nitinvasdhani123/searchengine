--you can chage the codes of database this is dummy for user id or password


-- phpmyadmin code
    -- username= infohunt
    -- hostname=localhost
    -- password=Anubhav@#3333

    -- $username="infohunt";
    -- $password="Anubhav@#3333";
    -- $database="infohunt";
    -- $server="localhost";

-- signup database command
create table signup
(
    FirstName varchar(40) NOT NULL,
    LastName varchar(40) NOT NULL,
    Gender varchar(10) NOT NULL,
    Email varchar(40) primary key,
    UserPassword varchar(20)
);
-- user verification table where holds the all details when user try to signup if there is no account before
CREATE TABLE Verification_Otp (
    id INT AUTO_INCREMENT PRIMARY KEY,
    FirstName varchar(40) Not Null,
    LastName varchar(40) NOT NULL,
    Gender varchar(10) NOT NULL,
    Email VARCHAR(40) NOT NULL,
    UserPassword varchar(20) NOT NULL,
    Otp Int(5) NOT NULL
);
-- THE trigger which is responsible for getting data from signup to login
CREATE TRIGGER `updatelogin` AFTER INSERT ON `signup` FOR EACH ROW INSERT INTO login VALUES('',new.FirstName,new.gender,new.Email,new.UserPassword); 

-- login database command
create table login(
    SerialNo INT AUTO_INCREMENT PRIMARY KEY,
    FirstName varchar(40) NOT NULL,
    Gender varchar(10) NOT NULL,
    Email varchar(40) NOT NULL,
    UserPassword varchar(20) NOT NULL
);


-- when user try to forget password if there is account exists 
create table ForgetUser
(
    Email varchar(40) NOT NULL ,
    otp Int(5) NOT NULL
);

-- Trigger for login (signup data to login table)

-- CREATE TRIGGER `autodelete` BEFORE INSERT ON `Verification_Otp` FOR EACH ROW delete from Verification_Otp ; NOT IN WORKING BECAUSE IT IS ALREADY DONE THROUGH PHP

-- user feedback
CREATE table feedback(
    FirstName varchar(40) NOT Null,
    LastName varchar(40) NOT Null,
    PhoneNumber INT(11) NOT Null,
    Message varchar(4000) NOT Null,
    Email varchar(100) NOT NULL
);