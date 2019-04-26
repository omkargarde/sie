<?php
  ini_set('display_errors',"1");
  class Training {
    // DB stuff
    private $conn;
    private $table = 'faculty';

    // Post Properties
    public $training_id;
    public $training_work;
    public $training_funding_agency;
    public $training_amount;
    public $training_topic;
    public $faculty_id;
    public $faculty_name;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function readALlTraining() {
      // Create query
      $query = "SELECT t.id as training_id,t.work as training_work, t.fundingAgency as training_funding_agency,t.amount as training_amount,t.topic as training_topic, s.id as faculty_id,s.name as faculty_name FROM ((faculty s INNER JOIN trainingFaculty pf ON pf.facultyId = s.id)
              INNER JOIN training t ON t.id = pf.trainingId)";
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
?>
