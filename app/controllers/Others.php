<?php
  class Others extends Controller {
    public function __construct(){
     	$this->otherModel = $this->model('Other');
    }

    public function fetchschoolyear(){
    	echo $this->otherModel->getschoolyear();
    }

    public function insertSY() {
    	$descr = $_POST['descr'];
    	echo $this->otherModel->addSY($descr);
    }

    public function insertSYDates() {
        $a = $_POST['sy'];
        $b = $_POST['startDate'];
        $c = $_POST['endDate'];
        $d = $_POST['sem'];
        
        echo $this->otherModel->addSYDates($a,$b,$c,$d);
    }

    public function fetchschoolyeardate() {
        $a = $_GET['sy'];
        $d = $_GET['sm'];
        
        echo $this->otherModel->getSYDates($a,$d);
    }

    public function lookup_password() {

        echo $this->otherModel->lookup_password($_GET['id']);

    }

 }