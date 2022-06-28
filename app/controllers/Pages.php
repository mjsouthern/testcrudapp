<?php
  class Pages extends Controller {
    public function __construct(){
      
    }
    
    public function index(){
      if(isLoggedIn()){
        redirect('dashboards');
      }
      
      $data = [
        'username_err' => '',
        'username' => '',
        'password_err' => '',
        'password' => ''
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users',
        'active_nav' => 'about'
      ];

      $this->view('pages/about', $data);
    }

    public function contact(){
      $data = [
          'title' => 'Contact Us',
          'description' => 'You can contact us through this medium',
          'info' => 'You can contact me with the following details below if you like my program and willing to offer me a contract and work on your project',
          'name' => 'Omonzebaguan Emmanuel',
          'location' => 'Nigeria, Edo State',
          'contact' => '+2348147534847',
          'mail' => 'emmizy2015@gmail.com',
          'active_nav' => 'contact'
      ];

      $this->view('pages/contact', $data);
    }

    public function upload(){
      $data = [
          'title' => 'Test Upload',
          'active_nav' => 'upload'
      ];

      $this->view('pages/upload', $data);
    }
  }