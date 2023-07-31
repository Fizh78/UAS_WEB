<?php 

class Auth_model {
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser($email, $password)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email AND password = :password');
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        return $this->db->single();
    }

    public function createUser($data)
    {
        $query = "INSERT INTO $this->table (username, email, password, role)
                VALUES (:username, :email, :password, :role)";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('role', $data['role']);

        $this->db->execute();
    }
}