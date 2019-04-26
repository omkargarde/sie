<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  ini_set('display_errors',"1");

  include_once '../../config/Database.php';
  include_once '../../models/Patent.php';

function encodeData(){
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  //$posts_arr = array();

  $pat = new Patent($db);
  // Blog post query
  $result = $pat->readALlPatent();
  // Get row count

  $num = $result->rowCount();


  //echo $num;
  // Check if any posts
  //echo $num;
  if($num > 0) {
    // Post array

     $pat_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      //echo $row['faculty_id'];
      $pat_item = array(
        'faculty_id' => $faculty_id,
        'faculty_name' => $faculty_name,
        'patent_id'  => $patent_id,
        'patent_title' => $patent_title,
        'patent_status' => $patent_status,
        'patent_author' => $patent_author,
        'patent_filing_date' => $patent_filing_date

      );
      //echo $pro_item['faculty_id'];

      // Push to "data"
      //array_push($posts_arr, $post_item);
       array_push($pat_arr, $pat_item);
}

    //echo json_encode(array($post_arr));

    // Turn to JSON & output
    //echo json_encode($posts_arr);
    // Turn to JSON & output
    return json_encode($pat_arr);

}
}
echo encodeData();
?>
