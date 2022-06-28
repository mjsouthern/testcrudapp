<?php
  class Dashboards extends Controller {
    public function __construct(){
     	$this->dashboardModel = $this->model('Dashboard');
    }
    
    public function index(){    
    $data = [
        'num_teacher' => number_format($this->dashboardModel->numberOfTeachers()->countteacher),
        'num_students' => number_format($this->dashboardModel->numberOfStudents()->countstudent),
        'num_users' => number_format($this->dashboardModel->numberOfUsers()->countuser)
    ]; 

      $this->view('dashboard/index',$data);
    }


    public function monitoring() {
        $sdate = $_GET['startDate'];
        $edate = $_GET['endDate'];
        //echo $sdate." ".$edate;
        echo $this->dashboardModel->getMonitoringOfResultsByDept($sdate,$edate);
    }


}