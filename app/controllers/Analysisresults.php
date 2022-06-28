<?php
  class Analysisresults extends Controller {
    public function __construct(){
     	$this->analysisresultsModel = $this->model('Analysisresult');
    }
    
    public function comparative($analysis,$type){

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

    	if($analysis=='analysis1') {
    		$this->view('analysisresult/comparative',$data);
    	} elseif ($analysis=='analysis2') {
    		$this->view('analysisresult/comparative2',$data);
    	}
     
    }

    public function searchteacher(){
    	$lname = $_GET['lname'];

        if($lname==''){
            echo 0;
        } else {
            echo $this->analysisresultsModel->fetchteacher($lname);
        }
    	
    }

    public function loadDataComparativeAnalysis1(){
        $id = $_GET['id'];
        $dept = $_GET['dept'];
        $area = $_GET['area'];

        
        echo $this->analysisresultsModel->fetchComparativeAnalysis1Data($id,$dept,$area);
         
    }

    public function loadDataComparativeAnalysis2(){
        $id = $_GET['id'];
        $dept = $_GET['dept'];
        
        echo $this->analysisresultsModel->fetchComparativeAnalysis2Data($id,$dept);
         
    }
    

}