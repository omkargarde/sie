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
  $this->username = $_POST['adminLoginId'];
  $this->password = $_POST['adminLoginPassword'];
    //$this->password = json_decode($_POST['adminLoginPassword'],false);
}

function verifyDetails(){

  echo $this->username;
  echo $this->password;
  if($this->username == 'admin' && $this->password == 'hello'){

    header("HTTP/1.1 303 See Other");
    header('Location:adminOptions.html');
    die();
  }
  else {
    //echo "<script type = text/javascript
    //window.alert('Invalid Username or Password!!');</script>"
    die("Wrong username or password");
  }
}
}


$admin = new adminLogin();
//$admin->getjson();
$admin->getDetails();
$admin->verifyDetails();
 ?>
