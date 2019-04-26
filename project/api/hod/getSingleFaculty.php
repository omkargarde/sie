<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Patent.php';
  include_once '../../models/Book.php';
  include_once '../../models/Faculty.php'

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  //$posts_arr = array();
  $fac = new Faculty($db);

  // Blog post query
  $result = $fac->readSingleFaculty();
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
        'id' => $id,
        'name' => $name,
        'patent_id' => $patent_id,
        'patent_pi' => $patent_pi,
        'patent_budget' => $patent_budget,
        'patent_status' => $patent_status,
        'patent_month' => $patent_month
      );

      // Push to "data"
      //array_push($posts_arr, $post_item);
       array_push($posts_arr, $post_item);
    }

    //echo json_encode($post_item);

    // Turn to JSON & output
    //echo json_encode($posts_arr);

  }

 $book = new Book($db);
 //echo "After this";

  // Blog post query
  $result1 = $book->readALlBook();
  // Get row count
  $num1 = $result1->rowCount();
  if($num1 > 0) {
    // Post array

     $posts1_arr = array();

    while($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {
      extract($row1);

      $post1_item = array(
        'id' => $id,
        'name' => $name,
        'book_id' => $book_id,
        'book_name' => $book_name,
        'book_publisher' => $book_publisher,
        'book_isbn' => $book_isbn
      );

      // Push to "data"
      //array_push($posts_arr, $post_item);
       array_push($posts1_arr, $post1_item);
    }

    // Turn to JSON & output
    echo json_encode(array($posts_arr,$posts1_arr));

  }
