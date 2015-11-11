
/*
--select the database to use. There is only 1 database we can use.
*/
USE b7_16806033_testdb;

/*

//Naming Conventions for CakePHP:
//http://book.cakephp.org/2.0/en/getting-started/cakephp-conventions.html


--I added a person table, since a lot of the information
--in administrator and faculy is the same.

--However, I kept the faculty and administrator tables because
--they add encapsulation in other tables, so nobody accidently
--references a faculty when they wanted to reference an administrator,
--and vice-versa


*/

CREATE TABLE person(
  pawprint varchar(10),
  password varchar(20),
  full_name varchar(50),
  campus_address varchar(50),
  campus_phone varchar(10),
  PRIMARY KEY(pawprint)

);

CREATE TABLE faculty (
  faculty_pawprint_id varchar(10),
  FOREIGN KEY (faculty_pawprint_id) REFERENCES person (pawprint)

);
CREATE TABLE administrator (
  administrator_pawprint_id varchar(10),
  FOREIGN KEY (administrator_pawprint_id) REFERENCES person (pawprint)

);
CREATE TABLE department (
  department_name varchar(20),
  title varchar(20),
  faculty_pawprint_id varchar(10),
  FOREIGN KEY(faculty_pawprint_id) REFERENCES faculty (faculty_pawprint_id)
);

CREATE TABLE academic_career (
  faculty_pawprint_id varchar(10),
  career_requested varchar(10),
  FOREIGN KEY(faculty_pawprint_id) REFERENCES faculty (faculty_pawprint_id)

);


CREATE TABLE ferpa_status (
  form varchar(20),
  score_percent decimal CHECK(score >= 0 && score <= 100),
  faculty_pawprint_id varchar(10),
  FOREIGN KEY(faculty_pawprint_id) REFERENCES faculty(faculty_pawprint_id)

);


/*
--form tables
*/

CREATE TABLE form (
  faculty_pawprint_id varchar(10),
  form_id int CHECK (FormID >= 0),
  approved boolean,
  new_request boolean,
  additional_request boolean,
  check_if_student_worker boolean,
  current_staff_member boolean,
  former_staff_member boolean,
  staff_member_name varchar(50),
  staff_member_position varchar(50),
  staff_member_pawprint varchar(10),
  staff_member_empl_id varchar(10),
  PRIMARY KEY(form_id),
  FOREIGN KEY(faculty_pawprint_id) REFERENCES faculty(faculty_pawprint_id)
);



CREATE TABLE form_view_update_elements (
  /*
  --Link to the form this is a part of.
  --Doesn't need pawprint too. Ther is a unique FormID for each form. (from the PRIMARY KEY line)
  */
  form_id int CHECK (FormID >= 0),
  /*
  --Used as a primary key, shows up on the form
  */
  role varchar (30),
  view_checked boolean,
  update_checked boolean,

  PRIMARY KEY(role),
  FOREIGN KEY(form_id) REFERENCES form (form_id)

);



CREATE TABLE admissions (
  form_id int CHECK (form_id >= 0),
  name VARCHAR(10),

  PRIMARY KEY(name),
  FOREIGN KEY(form_id) REFERENCES form(form_id)
);
