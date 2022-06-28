<?php
class Users extends Controller{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function verify_name() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $data = [

                    'name' => trim($_POST['name'])
            ];

            if(empty($data['name'])){
                echo "empty";
            } else {
                echo ($this->userModel->findUserByName($data['name'])) ? '1' : '0';
            }
        }
    }

    public function verify_email() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $data = [

                    'email' => trim($_POST['email'])
            ];

            if(empty($data['email'])){
                echo "empty";
            } else {
                echo ($this->userModel->findUserByEmail($data['email'])) ? '1' : '0';
            }
        }
    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           // process form
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password'])
            ];


            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            if($this->userModel->register($data)){
                //flash('register_success', 'you are registerd you can login now');
                //redirect('users/login');
                echo "success";
            }

        }else{
            //init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'active_nav' => 'reg'
            ];
            //load view
            $this->view('users/register', $data);          
        }
    }

    public function login($message = null){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
           // process form
           $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 
           $data = [
               'username' => trim($_POST['username']),
               'password' => trim($_POST['password']),
               'username_err' => '',
               'password_err' => ''
           ];

            //validate email
            if(empty($data['username'])){
                $data['username_err'] = 'Please enter username';
            }else{
                if($this->userModel->findUserByUsername($data['username'])){
                    //user found
                }else{
                    $data['username_err'] = 'User not found';
                }
            }

            //validate password 
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter your password';
            }elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be atleast six characters';
            }
            
            //make sure error are empty
            if(empty($data['username_err']) && empty($data['password_err'])){
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                if($loggedInUser){
                    //create session
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = 'Password incorrect';
                    $this->view('pages/index', $data);
                }
               
            }else{
                $this->view('pages/index', $data);
            }

        }
    }

    //setting user section variable
    public function createUserSession($user){
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['name'] = $user->user_uname;
        $_SESSION['p'] = $user->user_pass;
        $_SESSION['flog'] = 1;
        redirect('dashboards/index');
    }

    //logout and destroy user session
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        session_destroy();
        redirect('pages/index');
    }

    public function update(){
        $uid = $_POST['uid'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        echo $this->userModel->updateUserAcc($uname,$pass,$uid);
    }
}