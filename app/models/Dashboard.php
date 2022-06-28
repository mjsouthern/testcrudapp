<?php
class Dashboard {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function numberOfTeachers(){
        $this->db->query('SELECT COUNT(*) as countteacher FROM teacher');
        $row = $this->db->single();

        return $row;
    }

    public function numberOfStudents(){
        $this->db->query('SELECT COUNT(*) as countstudent FROM student');
        $row = $this->db->single();

        return $row;
    }

    public function numberOfUsers(){
        $this->db->query('SELECT COUNT(*) as countuser FROM user');
        $row = $this->db->single();

        return $row;
    }

    public function numberOfEvaluated(){
        $this->db->query('SELECT COUNT(DISTINCT stud_ID) AS cnt FROM evaluated');
        $row = $this->db->single();

        return $row;
    }

    public function getMonitoringOfResultsByDept($startdate,$enddate){
        $this->db->query("SELECT d.dept_name,COUNT(*) AS cnt FROM result r INNER JOIN student s ON r.stud_ID=s.stud_ID INNER JOIN department d ON s.dept_id=d.dept_id WHERE result_date BETWEEN CAST('$startdate' AS DATE) AND CAST('$enddate' AS DATE) GROUP BY s.dept_id");

        $result = $this->db->resultSet();

        return json_encode($result);
    }


}