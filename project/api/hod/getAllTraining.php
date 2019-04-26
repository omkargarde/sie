<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  ini_set('display_errors',"1");
  include_once '../../config/Database.php';
  include_once '../../models/Training.php';

function encodeData(){
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  //$posts_arr = array();

  $train = new Training($db);
  // Blog post query
  $result = $train->readALlTraining();
  // Get row count

  $num = $result->rowCount();


  //echo $num;
  // Check if any posts
  //echo $num;
  if($num > 0) {
    // Post array

     $train_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      //echo $row['faculty_id'];
      $train_item = array(
        'faculty_id' => $faculty_id,
        'faculty_name' => $faculty_name,
        'training_id' =>$training_id,
        'training_work'  => $training_work,
        'training_funding_agency' => $training_funding_agency,
        'training_amount' => $training_amount,
        'training_topic' => $training_topic

      );
      //echo $pro_item['faculty_id'];

      // Push to "data"
      //array_push($posts_arr, $post_item);
       array_push($train_arr, $train_item);
}

    //echo json_encode(array($post_arr));

    // Turn to JSON & output
    //echo json_encode($posts_arr);
    // Turn to JSON & output
    return json_encode($train_arr);

}
}
echo encodeData();
?>
