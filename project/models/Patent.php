<?php
  class Patent {
    // DB stuff
    private $conn;
    private $table = 'faculty';

    // Post Properties
    public $patentId;
    public $patentTitle;
    public $patentTopic;
    public $patentAuthor;
    public $patentFiledDate;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function readALlPatent() {
      // Create query
      $query = 'SELECT p.id as patent_id, p.title as patent_title, p.status as patent_status, p.author as patent_author, p.filedDate as patent_filing_date, s.id as faculty_id,s.name as faculty_name FROM ((faculty s INNER JOIN patentFaculty pf ON pf.facultyId = s.id) INNER JOIN patent p ON p.id = pf.patentId)';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    /*public function getSinglePatent($id)
    {
      $query = 'SELECT p.id as patent_id,
                p.pi as patent_pi,
                p.budget as patent_budget,
                p.status as patent_status,
                p.month as patent_month,
                s.id,s.name
                FROM ' . $this->table . ' s
                LEFT JOIN
                patent p ON p.staff_id = s.id WHERE s.id ='.$id.'';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }*/

  }
