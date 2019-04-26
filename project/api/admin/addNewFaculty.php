<?php
  header('Access-Control-Allow-Origin: *');
  ini_set('display_errors',"1");
include_once '../../config/Database.php';

class addNewFaculty{

  private $facultyName;
  private $facultyId;
  private $facultyDOB;
  private $facultyEmail;
  private $facultyPassword;

  function getFacultyDetails(){

    $this->facultyName = $_POST['facultyName'];
    $this->facultyId = $_POST['facultyId'];
    $this->facultyDOB = $_POST['facultyDOB'];
    $this->facultyEmail = $_POST['facultyEmail'];
    $this->facultyPassword = $_POST['facultyPassword'];
  }

  function updateDatabase(){
    //echo $this->facultyName;
      $database = new Database();
      $db = $database->connect();
      if($db)
        echo "Connection Successful";
      else {
        echo "Connection Failed";
      }
      $hashedPassword = password_hash($this->facultyPassword, PASSWORD_DEFAULT);
      $statement = "INSERT INTO faculty (name,id,dateOfBirth,email,password) VALUES ('$this->facultyName','$this->facultyId','$this->facultyDOB','$this->facultyEmail','$this->facultyPassword')";
      $stmt = $db->prepare($statement);
      //$stmt = "SELECT * FROM faculty";
      if($stmt->execute()){
      echo"Entry Added Successfully";
      header("Refresh: 1.5; url= adminOptions.html");
      die();
    }
      else{
         echo"Updation Failed";
      header("Refresh: 1.5; url= adminOptions.php");
      die();
    }
    }
}

$newFaculty = new addNewFaculty();
$newFaculty->getFacultyDetails();
$newFaculty->updateDatabase();

 ?>
