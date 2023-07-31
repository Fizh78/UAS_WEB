<?php 

class Dashboard_portfolio_model {
    private $table = 'portfolio';
    private $imageTable = 'image';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPortfolio()
    {
        $query = "SELECT portfolio.*, image.image AS image_filename 
              FROM $this->table AS portfolio
              LEFT JOIN $this->imageTable AS image ON portfolio.id = image.portfolio_id";
    
        $this->db->query($query);
        $results = $this->db->resultSet();

        // Group events by ID and collect associated images
        $portfolios = [];
        foreach ($results as $row) {
            $porfolio_id = $row['id'];

            if (!isset($portfolios[$porfolio_id])) {
                // Create a new porfolio entry
                $portfolios[$porfolio_id] = [
                    'id' => $porfolio_id,
                    'title' => $row['title'],
                    'client' => $row['client'],
                    'category' => $row['category'],
                    'project_date' => $row['project_date'],
                    'description' => $row['description'],
                    'images' => []
                ];
            }

            if (!empty($row['image_filename'])) {
                // Add image filename to the porfolio's images array
                $portfolios[$porfolio_id]['images'][] = $row['image_filename'];
            }
        }

        return array_values($portfolios);
    }

    public function getPortfolioById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function editPortfolio($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataPortfolio($data)
    {
        // Insert event data into the 'event' table
        $query = "INSERT INTO $this->table (title, client, category, project_date, description)
                VALUES (:title, :client, :category, :project_date, :description)";

        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('client', $data['client']);
        $this->db->bind('category', $data['category']);
        $this->db->bind('project_date', $data['project_date']);
        $this->db->bind('description', $data['description']);
        

        $this->db->execute();
        $portfolio_id = $this->db->lastInsertId();

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
                    $upload_dir = 'C:/xampp/htdocs/portofolio/public/images/'; // Change the directory path as per your requirement

                    // Generate a unique filename for the image
                    $image_filename = uniqid() . '_' . $image_name;

                    // Move the uploaded image to the desired directory
                    move_uploaded_file($image_tmp_name, $upload_dir . $image_filename);

                    // Insert image details into the 'image' table
                    $query = "INSERT INTO $this->imageTable (portfolio_id, image)
                            VALUES (:portfolio_id, :image)";

                    $this->db->query($query);
                    $this->db->bind('portfolio_id', $portfolio_id);
                    $this->db->bind('image', $image_filename);
                    $this->db->execute();
                }
            }
        }

        return $this->db->rowCount();
    }



    public function hapusDataPortfolio($id)
    {
        // Delete associated images from the 'image' table
        $query = "DELETE FROM $this->imageTable WHERE portfolio_id = :portfolio_id";
        
        $this->db->query($query);
        $this->db->bind('portfolio_id', $id);

        $this->db->execute();

        // Delete event from the 'event' table
        $query = "DELETE FROM $this->table WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        

        return $this->db->rowCount();
    }


    public function ubahDataPortfolio($data)
    {
        $query = "UPDATE $this->table SET
                    title = :title,
                    client = :client,
                    category = :category,
                    project_date = :project_date,
                    description = :description
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('title', $data['title']);
        $this->db->bind('client', $data['client']);
        $this->db->bind('category', $data['category']);
        $this->db->bind('project_date', $data['project_date']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        // Handle image changes
        if (isset($_FILES['images'])) {
            // Delete existing images related to this portfolio
            $deleteQuery = "DELETE FROM $this->imageTable WHERE portfolio_id = :portfolio_id";
            $this->db->query($deleteQuery);
            $this->db->bind('portfolio_id', $data['id']);
            $this->db->execute();

            // Insert new images into the 'image' table
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
                    $upload_dir = 'C:/xampp/htdocs/portofolio/public/images/'; // Change the directory path as per your requirement

                    // Generate a unique filename for the image
                    $image_filename = uniqid() . '_' . $image_name;

                    // Move the uploaded image to the desired directory
                    move_uploaded_file($image_tmp_name, $upload_dir . $image_filename);

                    // Insert image details into the 'image' table
                    $query = "INSERT INTO $this->imageTable (portfolio_id, image)
                            VALUES (:portfolio_id, :image)";

                    $this->db->query($query);
                    $this->db->bind('portfolio_id', $data['id']);
                    $this->db->bind('image', $image_filename);
                    $this->db->execute();
                }
            }
        }

        return $this->db->rowCount();
    }



    public function getLatestPortfolio($limit = 3)
    {
        $query = "SELECT portfolio.*, image.image AS image_filename 
              FROM $this->table AS portfolio
              LEFT JOIN $this->imageTable AS image ON portfolio.id = image.portfolio_id
              ORDER BY portfolio.project_date DESC
              LIMIT :limit";
    
        $this->db->query($query);
        $this->db->bind('limit', $limit);
        $results = $this->db->resultSet();

        // Group events by ID and collect associated images
        $portfolio = [];
        foreach ($results as $row) {
            $portfolio_id = $row['id'];

            if (!isset($portfolio[$portfolio_id])) {
                // Create a new event entry
                $portfolio[$portfolio_id] = [
                    'id' => $portfolio_id,
                    'title' => $row['title'],
                    'client' => $row['client'],
                    'category' => $row['category'],
                    'project_date' => $row['project_date'],
                    'description' => $row['description'],
                    'images' => []
                ];
            }

            if (!empty($row['image_filename'])) {
                // Add image filename to the event's images array
                $portfolio[$portfolio_id]['images'][] = $row['image_filename'];
            }
        }

        return array_values($portfolio);
        
    }


    public function detail($id)
    {
        $query = "SELECT portfolio.*, image.image AS image_filename 
            FROM $this->table AS portfolio
            LEFT JOIN $this->imageTable AS image ON portfolio.id = image.portfolio_id
            WHERE portfolio.id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $result = $this->db->single();

        if (!$result) {
            return null; // Portfolio with the given ID not found
        }

        // Group portfolio images
        $portfolio_images = [];
        if (!empty($result['image_filename'])) {
            $portfolio_images[] = $result['image_filename'];
        }

        $portfolio_details = [
            'id' => $result['id'],
            'title' => $result['title'],
            'client' => $result['client'],
            'category' => $result['category'],
            'project_date' => $result['project_date'],
            'description' => $result['description'],
            'images' => $portfolio_images
        ];

        return $portfolio_details;
    }


    public function getImageFilenamesByPortfolioId($portfolioId)
    {
        $query = "SELECT image FROM $this->imageTable WHERE portfolio_id = :portfolio_id";
        $this->db->query($query);
        $this->db->bind('portfolio_id', $portfolioId);
        $results = $this->db->resultSet();

        $imageFilenames = [];
        foreach ($results as $row) {
            $imageFilenames[] = $row['image'];
        }

        return $imageFilenames;
    }


}