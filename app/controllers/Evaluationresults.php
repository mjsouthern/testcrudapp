<?php
  class Evaluationresults extends Controller {
    public function __construct(){
     	$this->evalresultModel = $this->model('Evaluationresult');
    }
    
    public function index($type){    

      switch($type) {
        case 'students':
          $data = 'Students';
          break;
        case 'faculty':
          $data = 'Faculty';
          break;
        case 'head':
          $data = 'Immediate Head';
          break;
      }

      $this->view('evalresult/index',$data);
    }

    public function detailed($type){ 

      switch($type) {
        case 'students':
          $data = 'Students';
          break;
        case 'faculty':
          $data = 'Faculty';
          break;
        case 'head':
          $data = 'Immediate Head';
          break;
      }

      $this->view('evalresult/detailed',$data);
    }

    public function overall(){ 
      $this->view('evalresult/overall');
    }

    public function detailedprint(){    
      $this->view('evalresult/detailedprint');
    }

    public function detailedpdf(){    
      $this->view('evalresult/detailedpdf');
    }

    public function loadsummarizedresults(){    
        $sdate = $_GET['startdate'];
        $edate = $_GET['enddate'];
        $dept = $_GET['dept'];

        echo $this->evalresultModel->getSummarizedResults($sdate,$edate,$dept);
    }

    public function loaddetailedresults(){    
        $sdate = $_GET['startdate'];
        $edate = $_GET['enddate'];
        $dept = $_GET['dept'];
        $lname = $_GET['lname'];

        echo $this->evalresultModel->getDetailedResults($sdate,$edate,$dept,$lname);
    }


}