<?php
  class Book {

    // DB stuff
    private $conn;
    private $table = 'faculty';

    // Post Properties
    public $id;
    public $name;
    public $address;
    public $book_id;
    public $book_name;
    public $book_publisher;
    public $book_isbn;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function readALlBook()
    {
      // Create query
      $query = 'SELECT b.id as book_id,
                b.name as book_name,
                b.publisher as book_publisher,
                b.isbn as book_isbn,
                s.id,s.name
                FROM ' . $this->table . ' s
                INNER JOIN
                book b ON b.staff_id = s.id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    /*public function getSingleBook($id)
    {
      $query = 'SELECT b.id as book_id,
                b.name as book_name,
                b.publisher as book_publisher,
                b.isbn as book_isbn,
                s.id,s.name
                FROM ' . $this->table . ' s
                LEFT JOIN
                book b ON b.staff_id = s.id WHERE s.id ='.$id.'';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query

      // Execute query
      $stmt->execute();

      return $stmt;
    }*/

  }
?>
