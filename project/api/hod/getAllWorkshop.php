<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  ini_set('display_errors',"1");
  include_once '../../config/Database.php';
  include_once '../../models/Workshop.php';

function encodeData(){
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  //$posts_arr = array();

  $work = new Workshop($db);
  // Blog post query
  $result = $work->readALlWorkshop();
  // Get row count

  $num = $result->rowCount();


  //echo $num;
  // Check if any posts
  //echo $num;
  if($num > 0) {
    // Post array

     $work_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      //echo $row['faculty_id'];
      $work_item = array(
        'faculty_id' => $faculty_id,
        'faculty_name' => $faculty_name,
        'workshop_id' =>$workshop_id,
        'workshop_details'  => $workshop_details,
        'No_Students' => $No_Students,
        'No_Faculties' => $No_Faculties,
        'No_Industries' => $No_Industries

      );
      //echo $pro_item['faculty_id'];

      // Push to "data"
      //array_push($posts_arr, $post_item);
       array_push($work_arr, $work_item);
}

    //echo json_encode(array($post_arr));

    // Turn to JSON & output
    //echo json_encode($posts_arr);
    // Turn to JSON & output
    return json_encode($work_arr);

}
}
echo encodeData();
?>
