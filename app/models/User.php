<?php
class User {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    //register new user
    public function register($data){
        $this->db->query('INSERT INTO user (name, email, password) VALUES (:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //update user account
    public function updateUserAcc($uname,$pass,$id){
        $this->db->query('UPDATE user SET user_uname = :uname, user_pass= :upass WHERE user_id = :id');
        $this->db->bind(':uname', $uname);
        $this->db->bind(':upass', $pass);
        $this->db->bind(':id', $id);

        if($this->db->execute()){
            $_SESSION['name'] = $uname;
            $_SESSION['p'] = $pass;
            return true;
        }else{
            return false;
        }
    }

    //find user by email
    public function findUserByUsername($uname){
        $this->db->query('SELECT * FROM user WHERE user_uname = :uname');
        $this->db->bind(':uname', $uname);

        $row = $this->db->single();

        //check the row 
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }


    //find user by name
    public function findUserByName($name){
        $this->db->query('SELECT * FROM user WHERE name LIKE :name');
        $this->db->bind(':name', $name."%");

        $row = $this->db->single();

        //check the row 
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function login($username, $password){
        $this->db->query('SELECT * FROM user WHERE user_uname = :username AND user_pass = :pass');
        $this->db->bind(':username', $username);
        $this->db->bind(':pass', $password);
       
        $row = $this->db->single();

        //check the row 
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function getUserById($id){
        $this->db->query('SELECT * FROM user WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}