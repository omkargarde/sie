<?php
  ini_set('display_errors',"1");
  class Workshop {
    // DB stuff
    private $conn;
    private $table = 'faculty';

    // Post Properties
    public $workshop_id;
    public $workshop_details;
    public $No_students;
    public $No_Faculties;
    public $No_Industries;
    public $faculty_id;
    public $faculty_name;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function readALlWorkshop() {
      // Create query
      $query = "SELECT w.id as workshop_id,w.details as workshop_details, w.noOfStudents as No_Students,w.noOfFaculties as No_Faculties,w.noOfIndustries as No_Industries, s.id as faculty_id,s.name as faculty_name FROM ((faculty s INNER JOIN workshopFaculty pf ON pf.facultyId = s.id)
              INNER JOIN workshop w ON w.id = pf.workshopId)";
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
