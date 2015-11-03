
/*
--select the database to use. There is only 1 database we can use.
*/
USE cjc455;

/*

--people tables


--I added a person table, since a lot of the information
--in administrator and faculy is the same.

--However, I kept the faculty and administrator tables because
--they add encapsulation in other tables, so nobody accidently
--references a faculty when they wanted to reference an administrator,
--and vice-versa


*/

CREATE TABLE person(
  PawPrint varchar(10),
  ID varchar(10),
  Password varchar(20),
  Full_Name varchar(50),
  Campus_Address varchar(50),
  Campus_Phone varchar(10),
  PRIMARY KEY(PawPrint)

);

CREATE TABLE faculty (
  Faculty_PawPrint varchar(10),
  FOREIGN KEY (Faculty_PawPrint) REFERENCES person (PawPrint)

);
CREATE TABLE administrator (
  Administrator_PawPrint varchar(10),
  FOREIGN KEY (Administrator_PawPrint) REFERENCES person (PawPrint)

);
CREATE TABLE department (
  Department_Name varchar(20),
  Title varchar(20),
  Faculty_PawPrint varchar(10),
  FOREIGN KEY(Faculty_PawPrint) REFERENCES faculty (Faculty_PawPrint)
);

CREATE TABLE academic_career (
  Faculty_PawPrint varchar(10),
  Career_Requested varchar(10),
  FOREIGN KEY(Faculty_PawPrint) REFERENCES faculty (Faculty_PawPrint)

);

CREATE TABLE login (
  PawPrint varchar(10),
  Password varchar(20),
  FOREIGN KEY(PawPrint) REFERENCES person (PawPrint)

);

CREATE TABLE ferpa_status (
  Test_ID varchar(20),
  Score decimal CHECK(Score >= 0 && Score <= 100),
  Faculty_PawPrint varchar(10),
  FOREIGN KEY(Faculty_PawPrint) REFERENCES faculty(Faculty_PawPrint)

);


/*
--form tables
*/

CREATE TABLE form (
  Faculty_PawPrint varchar(10),
  FormID int CHECK (FormID >= 0),
  Approved boolean,
  PRIMARY KEY(FormID),
  FOREIGN KEY(Faculty_PawPrint) REFERENCES faculty(Faculty_PawPrint)
);



CREATE TABLE form_view_update_element (
  /*
  --Link to the form this is a part of.
  --Doesn't need pawprint too. Ther is a unique FormID for each form. (from the PRIMARY KEY line)
  */
  FormID int CHECK (FormID >= 0),
  /*
  --Used as a primary key, shows up on the form
  */
  Role varchar (30),
  View_Checked boolean,
  Update_Checked boolean,

  PRIMARY KEY(Role),
  FOREIGN KEY(FormID) REFERENCES form (FormID)

);

CREATE TABLE admissions (
  FormID int CHECK (FormID >= 0),
  name VARCHAR(10),

  PRIMARY KEY(name),
  FOREIGN KEY(FormID) REFERENCES form(FormID)
);
