<?php

//Example 12-3

require_once 'library.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//code for create user table here
$query = "create table Members(
    MEMBER_ID int(5),not null unique,
    FIRST_NAME varchar(32) not null,
    LAST_NAME  varchar(32) not null, 
     PHONE varchar(32) not null,
      EMAIL varchar(32) not null, 
     STREET  varchar(32) not null, 
     CITY varchar(32) not null,
     STATE varchar(32) not null, 
     ZIP varchar(32) not null,
     START_DATE varchar(32) not null,
     USER_NAME varchar(32) not null,
      PASSWORD varchar(32) not null
    
)";

$result = $conn->query($query);
if(!$result) die($conn->error);
?>