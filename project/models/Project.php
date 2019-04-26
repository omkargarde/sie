<?php
  class Project {
    // DB stuff
    private $conn;
    private $table = 'faculty';

    // Post Properties
    public $projectId;
    public $projectName;
    public $projectAgency;
    public $projectAmount;
    public $projectYear;
    public $projectTopic;
    public $projectField;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function readALlProject() {
      // Create query
      $query = 'SELECT p.id as project_id, p.name as project_name, p.agency as project_agency, p.amount as project_amount, p.year as project_year, s.id as faculty_id,s.name as faculty_name FROM ((faculty s INNER JOIN projectFaculty pf ON pf.facultyId = s.id) INNER JOIN project p ON p.id = pf.projectId)';

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
