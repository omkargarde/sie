<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Faculty.php';

function encodeData(){
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  //$posts_arr = array();

  $post = new Faculty($db);
  // Blog post query
  $result = $post->readALlFaculty();
  // Get row count

  $num = $result->rowCount();


  //echo $num;
  // Check if any posts

  if($num > 0) {
    // Post array

     $posts_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'facultyId' => $facultyId,
        'facultyName' => $facultyName
      );
      //echo $post_item[$id];

      // Push to "data"
      //array_push($posts_arr, $post_item);
       array_push($posts_arr, $post_item);
}

    //echo json_encode(array($post_arr));

    // Turn to JSON & output
    //echo json_encode($posts_arr);
    // Turn to JSON & output
    return json_encode($posts_arr);

}
}
echo encodeData();
?>
