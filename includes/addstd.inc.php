<?php

include_once 'dbh.inc.php';

$studentName = $_POST['studentName'];

$sql="insert into student(studentName) values('$studentName');";
mysqli_query($conn,$sql);
header("Location: ../index.php?add=succesfully");
