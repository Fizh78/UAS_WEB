<?php 

class Contact_model {
    private $table = 'contact_messages';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllContact()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }


    public function tambahDataContact($data)
    {
        $query = "INSERT INTO contact_messages (name, email, subject, message_content)
                VALUES (:name, :email, :subject, :message_content)";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('subject', $data['subject']);
        $this->db->bind('message_content', $data['message_content']);

        $this->db->execute();

        return $this->db->rowCount();
    }



    public function hapusDataContact($id)
    {
        $query = "DELETE FROM contact_messages WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataContact($data)
    {
        $query = "UPDATE 'event' SET
                    name = :name,
                    email = :email,
                    subject = :subject,
                    message_content = :message_content
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('subject', $data['subject']);
        $this->db->bind('message_content', $data['message_content']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


}