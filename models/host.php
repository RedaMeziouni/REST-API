<?php
class Post {
    // database settings
    private $conn;
    private $table = 'posts';

    // Post properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    // Setting up the constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    // Methode to Read Posts
    public function read() {
        // Create the Query
        $query = 'SELECT c.name AS category_name, 
        p.id, 
        p.category_id, 
        p.title, 
        p.body, 
        p.author, 
        p.created_at 
        FROM ' . $this->table . ' p LEFT JOIN categories c ON p.category_id = c.id 
        ORDER BY p.created_at DESC';

        // Create the Prepapred Statement
        $stmt = $this->conn->prepare($query);

        // Execute the query
        $stmt->execute();

        return $stmt;
    }
}