<?php
  $con=mysqli_connect("localhost","root","password");
  mysqli_query($con,"create database Blood;");
  mysqli_query($con,"create database BloodBank;");
  mysqli_select_db($con,"Blood");
  mysqli_query($con,"create table bankloginDB(UserName varchar(20),Password varchar(20), primary key(UserName));");
  mysqli_query($con,"create table loginDB(Mail varchar(64),Password varchar(20), primary key(Mail));");
  mysqli_query($con,"create table Needs(Acceptor varchar(20),Gmail varchar(40),BloodGroup varchar(5),Phone varchar(10),City varchar(20),date varchar(10),primary key(Gmail));");
  mysqli_query($con,"create table registerDB(Mail varchar(64),PhoneNumber varchar(10),BloodGroup varchar(5),DOB varchar(10),Room varchar(10),HouseNo varchar(20),Colony varchar(20),CityTown varchar(20),primary key(PhoneNumber));");
  mysqli_query($con,"insert into bankloginDB values('Jeevan','jeevan')");
  mysqli_query($con,"insert into bankloginDB values('Kakathiya','Kakathiyulu')");
  mysqli_query($con,"insert into bankloginDB values('MGMbloodbank','MGMdonars')");
  mysqli_query($con,"insert into bankloginDB values('RedCross','RedCross')");
  $bg=array("A+","A-","AB+","AB-","B+","B-","O+","O-");
  $bloodbanks=array("IndianRedCross","jeevanbloodbank","kakathiyabloodbank","MGMbloodbank");
  mysqli_select_db($con,"BloodBank");
  for($i=0;$i<4;$i++){
    mysqli_query($con,"create table $bloodbanks[$i](BloodGroup varchar(5),Amount int,primary key(BloodGroup))");
    for($j=0;$j<8;$j++){
      mysqli_query($con,"insert into $bloodbanks[$i] values('$bg[$j]',0)");
    }
  }
?>
