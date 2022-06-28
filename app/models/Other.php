<?php
  class Other {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getschoolyear(){
    	$queryString = "SELECT * FROM schoolyear ORDER BY description";
    	$this->db->query($queryString);
        $result = $this->db->resultSet();

        return json_encode($result);
    }

    public function addSY($descr) {
    	$this->db->query('INSERT INTO schoolyear(description) VALUES (:descr)');
        $this->db->bind(':descr', $descr);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }


    public function addSYDates($a,$b,$c,$d) {
        $this->db->query('INSERT INTO schoolyeardate(sy_id,startdate,enddate,sem) VALUES (:a, :b, :c, :d)');
        $this->db->bind(':a', $a);
        $this->db->bind(':b', $b);
        $this->db->bind(':c', $c);
        $this->db->bind(':d', $d);


        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function getSYDates($sy,$sem) {
        $queryString = "SELECT startdate, enddate FROM schoolyeardate WHERE sy_id=:a AND sem=:b";
        $this->db->query($queryString);
        $this->db->bind(':a', $sy);
        $this->db->bind(':b', $sem);

        $result = $this->db->single();

        return json_encode($result);

    }

    public function lookup_password($id) {
        $queryString = "SELECT user_pass FROM user WHERE user_id=$id";
        $this->db->query($queryString);
        $result = $this->db->single();

        return json_encode($result);

    }


 }