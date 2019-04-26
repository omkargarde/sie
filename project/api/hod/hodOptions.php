<?
if(!isset($_SESSION['hodId']))
  {
    header("Location:facultyLogin.html");
    die();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <link rel="stylesheet" href="css/main.css">
    <title>HOD Option</title>
  </head>
  <body class="bg-1">
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-danger"id="logout">Log Out</button>
      </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <br><br><br><br>
          <div class="card">
            <h4 class="card-title d-flex justify-content-center">HOD Login</h4>
            <div class="card-body">
    <!--<button type="button" class="btn btn-info col-md-12" name="button" onclick="location.href='showFacultyDetails.php'">Show Details</button><br><br>
--> <button type="button" class="btn btn-info col-md-12" name="button" onclick="location.href='showPatentDetails.php'">Show Patent Details</button><br><br>
    <button type="button" class="btn btn-info col-md-12" name="button" onclick="location.href='showTrainingDetails.php'">Show Training Details</button><br><br>
    <button type="button" class="btn btn-info col-md-12" name="button" onclick="location.href='showWorkshopDetails.php'">Show Workshop Details</button><br><br>
    <button type="button" class="btn btn-info col-md-12" name="button" onclick="location.href='showProjectDetails.php'">Show Projects Details</button><br><br>
    <script type="text/javascript">
        document.getElementById("logout").onclick = function () {
            location.href = "../../logout.php";
        };
    </script>
  </body>
</html>
