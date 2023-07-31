<?php 

class Event_model {
    private $table = 'event';
    private $imageTable = 'image';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllEvent()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getEventById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataEvent($data)
    {
        // Insert event data into the 'event' table
        $query = "INSERT INTO $this->table (title, deskripsi, venue, date, time, number_of_participants)
                VALUES (:title, :deskripsi, :venue, :date, :time, :number_of_participants)";

        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('venue', $data['venue']);
        $this->db->bind('date', $data['date']);
        $this->db->bind('time', $data['time']);
        $this->db->bind('number_of_participants', $data['number_of_participants']);

        $this->db->execute();
        $event_id = $this->db->lastInsertId();

        // Handle image upload and insertion into the 'image' table
        if (isset($_FILES['images'])) {
            $images = $_FILES['images'];

            foreach ($images['tmp_name'] as $key => $tmp_name) {
                // Check if the uploaded file is valid
                if ($images['error'][$key] === UPLOAD_ERR_OK) {
                    // Retrieve the image details
                    $image_name = $images['name'][$key];
                    $image_type = $images['type'][$key];
                    $image_size = $images['size'][$key];
                    $image_tmp_name = $images['tmp_name'][$key];

                    // Specify the directory to store the uploaded images
                    $upload_dir = 'C:/xampp/htdocs/UAS-EventManagement/public/images/'; // Change the directory path as per your requirement

                    // Generate a unique filename for the image
                    $image_filename = uniqid() . '_' . $image_name;

                    // Move the uploaded image to the desired directory
                    move_uploaded_file($image_tmp_name, $upload_dir . $image_filename);

                    // Insert image details into the 'image' table
                    $query = "INSERT INTO $this->imageTable (event_id, image)
                            VALUES (:event_id, :image)";

                    $this->db->query($query);
                    $this->db->bind('event_id', $event_id);
                    $this->db->bind('image', $image_filename);
                    $this->db->execute();
                }
            }
        }

        return $this->db->rowCount();
    }



    public function hapusDataEvent($id)
    {
        $query = "DELETE FROM event WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataEvent($data)
    {
        $query = "UPDATE 'event' SET
                    title = :title,
                    deskripsi = :deskripsi,
                    venue = :venue,
                    number_of_participants = :number_of_participants
                  WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('venue', $data['venue']);
        $this->db->bind('number_of_participants', $data['number_of_participants']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataEvent()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM 'event' WHERE title LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}