<?php

if(!isset($_SESSION['hodId']))
  {
    header("Location:hodLogin.html");
    die();
  }
$client = curl_init('http://localhost/project/api/hod/getAllFaculty.php?action=encodeData');
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
$result = json_decode($response);?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
    <body>
      <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-danger">Log Out</button>
        </div>
    <center>
    <div class = "table">
    <table class = "table-responsive">
    <thead class = "thead-dark">
      <tr>
      <th scope = "col">ID</th>
      <th scope = "col">Password</th>
      </tr>
      <?php if(count($result) > 0){
          foreach($result as $row){?>
            <tr>
            <td><?echo $row->facultyId ?></td>
            <td><?echo $row->facultyName ?></td>
          </tr>
          <?}}?>
    </thead>
    <tbody>
  </body>
</html>
