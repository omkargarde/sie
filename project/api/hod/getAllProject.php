<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Project.php';

function encodeData(){
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  //$posts_arr = array();

  $pro = new Project($db);
  // Blog post query
  $result = $pro->readALlProject();
  // Get row count

  $num = $result->rowCount();


  //echo $num;
  // Check if any posts
  //echo $num;
  if($num > 0) {
    // Post array

     $pro_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      //echo $row['faculty_id'];
      $pro_item = array(
        'faculty_id' => $faculty_id,
        'faculty_name' => $faculty_name,
        'project_id'  => $project_id,
        'project_name' => $project_name,
        'project_agency' => $project_agency,
        'project_amount' => $project_amount,
        'project_year'  => $project_year

      );
      //echo $pro_item['faculty_id'];

      // Push to "data"
      //array_push($posts_arr, $post_item);
       array_push($pro_arr, $pro_item);
}

    //echo json_encode(array($post_arr));

    // Turn to JSON & output
    //echo json_encode($posts_arr);
    // Turn to JSON & output
    return json_encode($pro_arr);

}
}
echo encodeData();
?>
