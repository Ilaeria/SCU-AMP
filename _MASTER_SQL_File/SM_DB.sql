/**********************************************************************************
Title: 			Shine DATABASE
Date: 			20170607
Author: 		Stephen Manning
Description: 	Database for 1st version of Shine app
***********************************************************************************/

CREATE TABLE  IF NOT EXISTS STAFF(
	StaffID				Int(10)				NOT NULL AUTO_INCREMENT,
	Email				Varchar(100)		NOT NULL UNIQUE,
	ContactNumber		Char(25)			NOT NULL,
	Passwrd				Char(25)			NOT NULL,
	FirstName			Char(25)			NOT NULL,
	LastName			Char(25)			NOT NULL,
	DateCreated			DateTime			NOT NULL,
	IsActive			Boolean				NOT NULL,
	IsAdministrator		Boolean				NOT NULL,
	IsContributor		Boolean				NOT NULL,
	CONSTRAINT			STAFF_PK			PRIMARY KEY(StaffID)
	);
	
CREATE TABLE  IF NOT EXISTS PLANNINGTEMPLATE (
	TemplateID			Int(10)				NOT NULL  AUTO_INCREMENT,
	Content				Text,				-- or Varchar(255)??? - see https://www.w3schools.com/sql/sql_datatypes.asp
	CONSTRAINT			PLAN_PK				PRIMARY KEY(TemplateID)
	);	

CREATE TABLE IF NOT EXISTS AUTHOR (
	AuthorID			Int(10)				NOT NULL  AUTO_INCREMENT,
	Email				Varchar(100)		NOT NULL UNIQUE,
	Passwrd				Char(25)			NOT NULL,
	IsActive			Boolean				NOT NULL,
	FirstName			Char(25)			NOT NULL,
	LastName			Char(25)			NOT NULL,
	DOB					Char(25)			NOT NULL,		/*or DateTime?*/
	Title			Char(25),
	Street1				Char(25)			NOT NULL,
	Street2				Char(25)			NOT NULL,
	City				Char(25)			NOT NULL,
	StateAU				Char(25)			NOT NULL,
	Country				Char(25)			NOT NULL,
	ContactNumber		Char(25)			NOT NULL,
	DateCreated			DateTime			NOT NULL,
	CONSTRAINT			AUTHOR_PK			PRIMARY KEY(AuthorID)
);

CREATE TABLE IF NOT EXISTS PROFILE (
	ProfileID			Int(10)				NOT NULL  AUTO_INCREMENT,
	AuthorID			Int(10)				NOT NULL,
	Content1			Text,				-- or Varchar(255)??? - see https://www.w3schools.com/sql/sql_datatypes.asp
	Content2			Text,
	Content3			Text,
	Content4			Text,
	Content5			Text,
	Content6			Text,
	Content7			Text,
	Content8			Text,	
	Photo1URL			Varchar(100),
	FirstName			Char(25)			NOT NULL,
	LastName			Char(25)			NOT NULL,
	DOB					Char(25)			NOT NULL,
	ProfileLevel		TinyInt(1)			NOT NULL,
	IsHidden			Boolean				NOT NULL,
	IsSuspended			Boolean				NOT NULL,
	IsDeleted			Boolean				NOT NULL,
	/*PushNotify,							Implement in Version 2 of app*/
	EmailNotify			Boolean				NOT NULL,
	SoundOnOff			Boolean				NOT NULL,
	/*Volume,								Implement in Version 2 of app*/
	TextSize			TinyInt(1)			NOT NULL,
	ColourScheme		TinyInt(1)			NOT NULL,
	NotifyNetwork		Boolean				NOT NULL,
	ProfileHistory		Text,
	CONSTRAINT 			PROFILE_PK			PRIMARY KEY(ProfileID),
	CONSTRAINT			PROFILE_AUTH_FK		FOREIGN KEY(AuthorID) REFERENCES AUTHOR(AuthorID)
							ON DELETE NO ACTION				
							ON UPDATE NO ACTION				
);

CREATE TABLE IF NOT EXISTS PROFHIST (
	EventID				Int(20)				NOT NULL	AUTO_INCREMENT,
	ProfileID			Int(10)				NOT NULL,
	EventDate			DateTime			NOT NULL,
	Event 				Char(100)			NOT NULL,
	CONSTRAINT			PROFHIST_PK			PRIMARY KEY (EventID),
	CONSTRAINT 			PROFHIST_PROF_FK	FOREIGN KEY (ProfileID) REFERENCES PROFILE(ProfileID)
							ON DELETE CASCADE				-- Delete Profile History if a Profile is deleted;
							ON UPDATE NO ACTION				-- Can't update PROFILE(ProfileID) because Surrogate Key
);

CREATE TABLE IF NOT EXISTS EMERGENCYCONTACT (
	EmergencyContactID	Int(10)				NOT NULL  AUTO_INCREMENT,
	ProfileID			Int(10)				NOT NULL,
	Email				Varchar(100)		NOT NULL,		-- For notifying people they've been added as emergency contact
	FirstName			Char(25)			NOT NULL,
	LastName			Char(25)			NOT NULL,
	ContactNumber		Char(25)			NOT NULL,
	DateCreated			DateTime			NOT NULL,
	CONSTRAINT 			EMERG_PK			PRIMARY KEY(EmergencyContactID),
	CONSTRAINT			EMERG_PROF_FK		FOREIGN KEY(ProfileID) REFERENCES PROFILE(ProfileID)
							ON DELETE CASCADE
							ON UPDATE NO ACTION
);
	
CREATE TABLE IF NOT EXISTS EXTRAPAGE (
	ExtraPageID			Int(10)				NOT NULL  AUTO_INCREMENT,
	ProfileID			Int(10)				NOT NULL,
	IsPublished			Boolean				NOT NULL,
	Content				Text,
	CONSTRAINT			EXTRA_PK			PRIMARY KEY(ExtraPageID),
	CONSTRAINT			EXTRA_PROF_FK		FOREIGN KEY(ProfileID) REFERENCES PROFILE(ProfileID)
							ON UPDATE NO ACTION		-- can't update surrogate key of Profile
							ON DELETE CASCADE		-- If a Profile object is deleted, delete all corresponding ExtraPage objects
);
	
CREATE TABLE IF NOT EXISTS REPORT (
	ReportID			Int(10)				NOT NULL  AUTO_INCREMENT,
	SuspectProfileID	Int					NOT NULL,
	ReporterEmail		Varchar(50)			NOT NULL,
	DateReported		DateTime			NOT NULL,
	Notes				Varchar(255),
	CONSTRAINT 			REPORT_PK			PRIMARY KEY (ReportID),
	CONSTRAINT			REPORT_FK_PROF		FOREIGN KEY(SuspectProfileID) REFERENCES PROFILE(ProfileID)
							ON DELETE CASCADE				-- If a Profile object is deleted, delete any corresponding Report objects
							ON UPDATE NO ACTION				-- Surrogate Key of Profile
);

CREATE TABLE IF NOT EXISTS  INVITATION (
	ProfileID			Int(10)				NOT NULL,
	InviteeEmail		Varchar(100)		NOT NULL,
	TimeSent			DateTime			NOT NULL,
	TimeClicked			DateTime,
	CONSTRAINT			INVIT_PK			PRIMARY KEY(ProfileID, InviteeEmail),
	CONSTRAINT			INVIT_PROF_FK		FOREIGN KEY(ProfileID) REFERENCES PROFILE(ProfileID)
							ON DELETE CASCADE				-- If a Profile is deleted, delete any corresponding Invitation objects
							ON UPDATE NO ACTION				-- Surrogate key of Profile

							/*CONSTRAINT			INVIT_VIEWER_FK		FOREIGN_KEY(ViewerID) REFERENCES VIEWER(ViewerID)
							ON DELETE NO ACTION				-- Can't delete Viewer if it has Invitation objects - must delete the latter first
							ON UPDATE NO ACTION				-- Surrogate key of Viewer*/
);


/****** TEST DATA *************/
INSERT INTO STAFF VALUES (NULL, 'Test-Staff_email01', 'Test-Staff_ContactNum01', 'Test-Staff_PW01', 'Test-Staff_FirstName01', 'Test-Staff_LastName01', 
	15-06-2017, TRUE, TRUE, TRUE);

INSERT INTO PLANNINGTEMPLATE VALUES (NULL, 'Test-PlanningTemplate-This is a planning template<br /> <h1>Planning Template/h1><br />Content goes here');
		
INSERT INTO AUTHOR VALUES (NULL, 'test1@gmail.com', 'test1', TRUE, 'Test-Author_FirstName01', 'Test-Author_LastName01', 
	01-01-1990, 'Ms', 'Test-Author_Street1-01', 'Test-Author_Street2-01', 'Test-Author_City-01', 'Test-Author_StateAU-01', 'Test-Author_Country-01',
		'Test-Author_ContactNum-01', 18-07-17);
		
INSERT INTO PROFILE VALUES (NULL, 1, 'TestProfile1 - Content1', 'TestProfile1 - Content2','TestProfile1 - Content3','TestProfile1 - Content4',
	'TestProfile1 - Content5','TestProfile1 - Content6','TestProfile1 - Content7','TestProfile1 - Content8','Test-Profile_URL-01', 
	'Test-Profile_FirstName-01', 'Test-Profile_LastName-01', 01-01-1970, 1, FALSE, FALSE, FALSE, FALSE, FALSE, 
		1, 1, 1, 'Test Profile History - 01');
		
INSERT INTO PROFHIST VALUES (NULL, 1, '2017-07-18 09:45:00', 'Profile Created'); 		

INSERT INTO EMERGENCYCONTACT VALUES (NULL, 1, 'Test-EmergencyContact_Email-01', 'Test-EmergencyContact_FName-01', 'Test-EmergencyContact_LName-01',
	'Test-EmergencyContact_ContactNum-01', 07-18-17);
	
INSERT INTO EXTRAPAGE VALUES (NULL, 1, TRUE, 'This is an extra page');

INSERT INTO REPORT VALUES (NULL, 1, 'Test-Report_ReporterEmail-01', 15-06-17, 'This is a suspect profile report = 01');

	