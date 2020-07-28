CREATE TABLE member(
MemberID INT(10) NOT NULL primary key AUTO_INCREMENT,
MemberCode INT(10) NOT NULL,
Firstname VARCHAR(255) NOT NULL,
Lastname VARCHAR(255) NOT NULL,
Dept VARCHAR(100) NOT NULL,
Section VARCHAR(100) NOT NULL,
Class INT(10) NOT NULL,
Room INT(10) NOT NULL,
Tel VARCHAR(100) NOT NULL,
Email VARCHAR(100) NOT NULL,
Password VARCHAR(255) NOT NULL,
Userlevel VARCHAR(100) NOT NULL,
SpecialStatus VARCHAR(100)
);

CREATE TABLE member_log(
LogID INT(10) NOT NULL primary key AUTO_INCREMENT,
IP VARCHAR(100) NOT NULL,
Event TEXT NOT NULL,
Date DATE NOT NULL,
Time TIME NOT NULL,
MemberID INT(10) NOT NULL,
foreign key(MemberID) references Member(MemberID)
);

CREATE TABLE log_system(
LogID INT(10) NOT NULL primary key AUTO_INCREMENT,
IP VARCHAR(100) NOT NULL,
Event TEXT NOT NULL,
Date DATE NOT NULL,
Time TIME NOT NULL
);

create table member_account(
AccountID INT(10) primary key AUTO_INCREMENT,
Account_number INT(50),
Bankbook INT(50),
Account_balance FLOAT(10),
MemberID INT(10),
foreign key(MemberID) references Member(MemberID)
);

CREATE TABLE member_trans(
TransID INT(10) NOT NULL primary key AUTO_INCREMENT,
Amount FLOAT(10) NOT NULL,
Date DATE NOT NULL,
Time TIME NOT NULL,
AccountID INT(10) NOT NULL,
Status INT(10) NOT NULL,
foreign key(AccountID) references member_account(AccountID)
);

CREATE TABLE create_account_form(
FormID INT(10) primary key AUTO_INCREMENT,
Firstname VARCHAR(255),
Lastname VARCHAR(255),
Email VARCHAR(100),
begin_cash FLOAT(10),
MemberID INT(10),
Status INT(10),
foreign key(MemberID) references Member(MemberID)
)