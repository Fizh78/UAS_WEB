<?php 

class Home_model {
    private $nama = 'Doddy Ferdiansyah';
    private $table = 'portfolio';
    private $imageTable = 'image';

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getUser()
    {
        return $this->nama;
    }

    public function getLatestPortfolio($limit = 8)
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
}