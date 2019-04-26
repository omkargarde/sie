<?php

  ini_set('display_errors',"1");
  include_once '../../config/Database.php';
  $conn = new Database();
  $connection = $conn->connect();
  $facultyName = $_POST['facultyName'];
  $facultyDOB = $_POST['facultyDOB'];
  $facultyEmail = $_POST['facultyEmail'];
  $facultyPassword = $_POST['facultyPassword'];

  session_start();
  $facultyId = $_SESSION['facultyId'];

  $query = "UPDATE faculty SET name = '$facultyName',dateOfBirth='$facultyDOB',email='$facultyEmail',password='$facultyPassword' WHERE id = '$facultyId'";
  $stmt = $connection->prepare($query);
  if($stmt->execute())
  {
    echo "Successfully Updated";
    session_destroy();
    header("Refresh: 1.5; url= adminOptions.html");
    die();
  }
  else {
    echo "Updatation Failed";
    header("Refresh: 1.5; url= adminOptions.html");
  }

 ?>
