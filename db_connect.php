<?php

$db = new mysqli("localhost", "root", "");
if ($db->connect_errno > 0) {
  die('Unable to connect to database [' . $db->connect_error . ']');
} //this line and above lines connect to the server

$db->query("CREATE DATABASE IF NOT EXISTS `Schools`");  // this line checks if the database has been created if not it create a database

mysqli_select_db($db, "Schools"); //this line select the created database

$stable = "CREATE TABLE IF NOT EXISTS Administrator (id int(11) NOT NULL auto_increment,   
                  Firstname varchar(30)NOT NULL,Sirname varchar(30)NOT NULL,
                  Username varchar(30)NOT NULL,Password varchar(30)NOT NULL,
                  Email varchar(30)NOT NULL,
                 PRIMARY KEY(id) )";
$db->query($stable);   //the above lines create table and its columns if not available in the server


$stable1 = "CREATE TABLE IF NOT EXISTS Students (id int(11) NOT NULL auto_increment,
                                  Firstname varchar(300)NOT NULL, 
                                  Sirname varchar(300)NOT NULL,
                                  Gender Varchar(30)NOT NULL,
                                  DOB varchar(300)NOT NULL,                                                               
                                  Address varchar(30)NOT NULL,                                 
                                  Guardian_Name varchar(300)NOT NULL,
                                  Guardian_Phone varchar(300)NOT NULL,       
                                  PRIMARY KEY(id) )";
$db->query($stable1);   //the above lines create table and its columns if not available in the server

$stable2 = "CREATE TABLE IF NOT EXISTS Subjects(id int(11) NOT NULL auto_increment,
                                  Subject_Name varchar(300)NOT NULL, 
                                  Subject_Code varchar(300)NOT NULL,
                                  Subject_Teacher varchar(300)NOT NULL,
                                  Subject_Hours varchar(300)NOT NULL,
                                  Subject_Grade varchar(300)NOT NULL,
                                  PRIMARY KEY(id) )";
$db->query($stable2);  //the above lines create table and its columns if not available in the server

$stable3 = "CREATE TABLE IF NOT EXISTS Teachers (id int(11) NOT NULL auto_increment,
                                  Teacher_Title Varchar(30)NOT NULL,
                                  Firstname varchar(300)NOT NULL, 
                                  Sirname varchar(300)NOT NULL,                                  
                                  Email varchar(300)NOT NULL, 
                                  Phone Varchar(30)NOT NULL,                                 
                                  PRIMARY KEY(id) )";
$db->query($stable3);   //the above lines create table and its columns if not available in the server        		                       

$stable4 = "CREATE TABLE IF NOT EXISTS School (id int(11) NOT NULL auto_increment,
                                  School_Name varchar(300)NOT NULL, 
                                  School_Email varchar(300)NOT NULL,
                                  School_Phone varchar(300)NOT NULL,                                  
                                  PRIMARY KEY(id) )";
$db->query($stable4);   //the above lines create table and its columns if not available in the server	                             


$sql = "SELECT * FROM Administrator ";
$result = mysqli_query($db, $sql);  //this line check if the table administratr is available
$count = mysqli_num_rows($result);     //this line count the number of rows/entries in the table administrator              
if ($count == 0)       //this line checks if the number of rows is equal to zero which means there is no entry in the database
{
  $enter = "INSERT INTO Administrator (Password,Email,Firstname,Sirname,Username) VALUES('1234554321','mvumapatrick@gmail.com','Patrick','Mvuma','pamzey')";
  $db->query($enter);  //this line insert values into the table after line 60 confirmed that there was no entry in the table
}

$sql = "SELECT * FROM School ";
$result = mysqli_query($db, $sql);  //this line check if the table school is available
$count = mysqli_num_rows($result);     //this line count the number of rows/entries in the table school              
if ($count == 0)       //this line checks if the number of rows is equal to zero which means there is no entry in the database
{
  $enter = "INSERT INTO School (School_Name,School_Email,School_Phone) VALUES('Univesirty Of Malawi','enquiries@unima.com','265-999-563-178')";
  $db->query($enter);  //this line insert values into the table after line 69 confirmed that there was no entry in the table
}

$sql = "SELECT * FROM Teachers ";
$result = mysqli_query($db, $sql);  //this line check if the table Teachers is available
$count = mysqli_num_rows($result);     //this line count the number of rows/entries in the table Teachers              
if ($count == 0)       //this line checks if the number of rows is equal to zero which means there is no entry in the database
{
  $enter = "INSERT INTO Teachers (Teacher_Title,Firstname,Sirname,Phone,Email) VALUES('Mrs','Sithembile','Chimaliro','265-999-876-600','schimaliro@gmail.com')";
  $db->query($enter);  //this line insert values into the table after line 78 confirmed that there was no entry in the table
}
$sql = "SELECT * FROM Subjects ";
$result = mysqli_query($db, $sql);  //this line check if the table Subjects is available
$count = mysqli_num_rows($result);     //this line count the number of rows/entries in the table Subjects             
if ($count == 0)       //this line checks if the number of rows is equal to zero which means there is no entry in the database
{
  $enter = "INSERT INTO Subjects (Subject_Name,Subject_Code,Subject_Grade,Subject_Teacher,Subject_Hours) VALUES('Mathematics','MAT1','100%','Mr James Banda','5/week')";
  $db->query($enter);  //this line insert values into the table after line 86 confirmed that there was no entry in the table
}
$sql = "SELECT * FROM Students ";
$result = mysqli_query($db, $sql);  //this line check if the table Students is available
$count = mysqli_num_rows($result);     //this line count the number of rows/entries in the table Students             
if ($count == 0)       //this line checks if the number of rows is equal to zero which means there is no entry in the database
{
  $enter = "INSERT INTO Students (Firstname,Sirname,Gender,DOB,Address,Guardian_Name,Guardian_Phone) VALUES('Maxwell','Subili','Male','18/05/1988','P.O.Box 34','Mwandida','265-888-345-908')";
  $db->query($enter);  //this line insert values into the table after line 94 confirmed that there was no entry in the table
}
