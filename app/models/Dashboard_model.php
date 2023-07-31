<?php 

class Dashboard_model {
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCountUsers()
    {
        $query = $this->db->query('SELECT COUNT(*) as total FROM ' . $this->table);
        $query = $this->db->single();
        $result = $query;

        if (isset($result['total'])) {
            return $result['total'];
        }
    
        return 0;
    }
    public function getCountPortfolio()
    {
        $query = $this->db->query('SELECT COUNT(*) as total_portfolio FROM portfolio');
        $query = $this->db->single();
        $result = $query;

        if (isset($result['total_portfolio'])) {
            return $result['total_portfolio'];
        }
    
        return 0;
    }
    public function getCountContact()
    {
        $query = $this->db->query('SELECT COUNT(*) as total_message FROM contact_messages');
        $query = $this->db->single();
        $result = $query;

        if (isset($result['total_message'])) {
            return $result['total_message'];
        }
    
        return 0;
    }
}