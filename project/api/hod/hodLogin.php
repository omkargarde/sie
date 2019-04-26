<?php

header('Access-Control-Allow-Origin: *');
  //header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


class adminLogin{

private $username;
private $password;
/*function getjson()
{
  $data = json_decode(file_get_contents("php://input"));
  echo $data->adminLoginId;
  echo $data->adminLoginPassword;

}*/
function getDetails()
{
  $this->username = $_POST['hodLoginId'];
  $this->password = $_POST['hodLoginPassword'];
    //$this->password = json_decode($_POST['adminLoginPassword'],false);
}

function verifyDetails(){

  echo $this->username;
  echo $this->password;
  if($this->username == 'hod' && $this->password == 'hello'){

    session_start();
    $_SESSION['hodId'] = $this->username;
    header("HTTP/1.1 303 See Other");
    header('Location:hodOptions.php');
    die();
  }
  else {
    //echo "<script type = text/javascript
    //window.alert('Invalid Username or Password!!');</script>"
    die("Wrong username or password");
  }
}
}


$hod = new adminLogin();
//$admin->getjson();
$hod->getDetails();
$hod->verifyDetails();
 ?>
