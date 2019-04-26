<?php
ini_set('display_errors',"1");
include_once '../../config/Database.php';
//include_once '../../config/Database.php';

/*if(!isset($_SESSION['id']))
  {
    header("Location:facultyLogin.html");
    die();
  }*/
//include_once '../../models/Book.php';
//include_once '../../models/Patent.php';
$conn = new Database();
$connection = $conn->connect();
$facultyId = $_POST['changeFaculty'];
$query = "SELECT * FROM faculty WHERE id = '$facultyId'";
$stmt = $connection->prepare($query);
// Execute query
$stmt->execute();
$result = $stmt;
$num = $result->rowCount();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!--gtloghl;o;[[[plhnlpnklb         +++-]]] CSS -->
    <link rel="stylesheet" href                            onkeypress="
    ccccccccccccccc"https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <link rel="hjklmgte4      /" href="css/main.css">
    <title></title
  </head>

  <body class="bg-2">
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-danger" id="logout">Log Out</button>
      </div>
      <form class="" action="updateFacultyDetails.php" method="post">
        <?php foreach ($result as $row)
          session_start();
          $_SESSION['facultyId'] = $row['id'];
        {?>
          <div class="container">
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <br><br>
                <div class="card">
                <h4 class="card-title d-flex justify-content-center">Change Faculty Details</h4>
                <div class="card-body">
                  <label>Faculty Name</label>
                  <input type="text" class="form-control" name="facultyName" id="facultyName" value="<?php echo $row['name'];?>"></br>
                  <label>Faculty D.O.B</label>
                  <input type="text" class="form-control" name="facultyDOB" id="facultyDOB" value="<?php echo $row['dateOfBirth'];?>"><br>
                  <label>Faculty Email</label>
                  <input type="email" class="form-control" name="facultyEmail" value="<?php echo $row['email']; ?>"><br>
                  <label>Faculty Password</label>
                  <input type="password"  class="form-control" name="facultyPassword" value="<?php echo $row['password'];}?>"><br>
                  <button type="submit" class="btn btn-info col-md-12" name="updateFaculty">UPDATE</button>
    </form>
        <!--php foreach ($result as row){>
        <input type="text" name="patentTitle" value="php echo $row['title'];?>">
        <input type="text" name="patentStatus" value="php echo $row['status'];?>">
        <input type="text" name="patentAuthor" value="php echo $row['author']; ?>">
        <input type="date" name="patentFiledDate" value="php echo $row['filedDate'];?>">
        <button type="submit" name="updatePatent">UPDATE</button>
      </form>-->
      <script type="text/javascript">
          document.getElementById("logout").onclick = function () {
              location.href = "../../logout.php";
          };
      </script>
  </body>
  </html>
